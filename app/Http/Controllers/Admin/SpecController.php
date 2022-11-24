<?php

namespace App\Http\Controllers\Admin;

use App\Models\Spec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Spec\StoreSpecRequest;
use App\Http\Requests\Admin\Spec\UpdateSpecRequest;

class SpecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.specs.index', ['specs' => Spec::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecRequest $request)
    {
        DB::beginTransaction();
        try {
            Spec::upsert($request->safe()->specs, 'name');
            DB::commit();
            return  isset($request->create) ?  redirect()->route('specs.index')->with(['success' => 'تمت العمليه بنجاح']) :
                redirect()->back()->with(['success' => 'تمت العمليه بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'فشلت العمليه ']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Spec $spec)
    {
        return view('admin.specs.edit', compact('spec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecRequest $request, Spec $spec)
    {
        DB::beginTransaction();
        try {
            $spec->update($request->validated());
            DB::commit();
            return
                redirect()->route('specs.index')->with(['success' => 'تمت العمليه بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'فشلت العمليه ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spec $spec)
    {
        DB::beginTransaction();
        try {
            $spec->delete();
            DB::commit();
            return
                redirect()->route('specs.index')->with(['success' => 'تمت العمليه بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'فشلت العمليه ']);
        }
    }
}
