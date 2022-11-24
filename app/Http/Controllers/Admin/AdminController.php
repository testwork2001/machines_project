<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\Admin\UpdateAdminRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected const  AVAILABLE_STATUS = ['مفعل' => 1, " غير مفعل" => 0];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.admins.create', ['statuses' => self::AVAILABLE_STATUS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->safe()->except('image', 'password_confirmation', 'email_verified_at', 'password');
            $data['password'] = Hash::make($request->safe()->password);
            $data['email_verified_at'] = $request->safe()->email_verified_at == 1 ? date('Y-m-d H:m:s') : null;
            $admin = Admin::create($data);
            if (isset($request->image)) {
                $admin->addMedia($request->image)->toMediaCollection('admins');
            }
            DB::commit();
            return  isset($request->create) ?  redirect()->route('admins.index')->with(['success' => 'تمت العمليه بنجاح']) :
                redirect()->back()->with(['success' => 'تمت العمليه بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with(['error' => 'فشلت العمليه ']);
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        
        return view('admin.admins.edit', ['admin' => $admin, 'statuses' => self::AVAILABLE_STATUS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        DB::beginTransaction();
        try {
            $data = $request->safe()->except(['email_verified_at', 'image', 'password']);
            if (!empty($request->safe()->password)) {
                $data['password'] = Hash::make($request->safe()->password);
            }

            $data['email_verified_at'] =  $request->safe()->email_verified_at == 1 ? date('Y-m-d H:m:s') : null;
            $admin->update($data);
            if (isset($request->safe()->image)) {
                $media = $admin->getMedia('admins');
                if (!empty($media[0])) {
                    $media[0]->delete();
                }
                $admin->addMedia($request->safe()->image)->toMediaCollection('admins');
            }
            DB::commit();
            return  redirect()->route('admins.index')->with(['success' => 'تمت العمليه بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admins.index')->with(['error' => 'فشلت العمليه ']);
        }
    }

 
}
