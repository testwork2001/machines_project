<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index' , ['categories'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    { 
        $data = []; 
        foreach($request->safe()->categories as $index =>$value) {
             $data[$index]['name'] = $value['name'];
             $data[$index]['slug'] = str_replace(' ' , '-' , $value['name']);
        }
        DB::beginTransaction();
        try {
            Category::upsert($data, ['name','slug']);
            DB::commit();
            return  isset($request->create) ?  redirect()->route('categories.index')->with(['success' => 'تمت العمليه بنجاح']) :
                redirect()->back()->with(['success' => 'تمت العمليه بنجاح']);
        } catch (\Exception $e) {
            dd($e->getMessage());
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        DB::beginTransaction();
        try {
            $data = [];
            $data['name'] = $request->safe()->name;
            $data['slug'] = str_replace(' ' , '-' , $data['name']);
            $category->update($data);
            DB::commit();
            return
                redirect()->route('categories.index')->with(['success' => 'تمت العمليه بنجاح']);
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
    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try {
            $category->delete();
            DB::commit();
            return
                redirect()->route('categories.index')->with(['success' => 'تمت العمليه بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'فشلت العمليه ']);
        }
    }
}
