<?php

namespace App\Http\Controllers\Admin;

use App\Models\Spec;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;

class ProductController extends Controller
{
    protected const  AVAILABLE_STATUS = ['متوفر حاليا' => 1, "غير متوفر حاليا" => 0];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', ['statuses' => self::AVAILABLE_STATUS, 'specs' => Spec::all(), 'categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->safe()->except('image', 'specs');
            $data['slug'] = str_replace(' ', '-', $request->safe()->name);
            $product = Product::create($data);
            $product->storeSpecs($request->safe()->specs);
            foreach ($request->safe()->images as $image) {
                $product->addMedia($image['file_name'])->toMediaCollection('products');
            }
            DB::commit();
            return  isset($request->create) ?  redirect()->route('products.index')->with(['success' => 'تمت العمليه بنجاح']) :
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
    public function edit($id)
    {
        $product = Product::where('id', $id)->with('specs')->get();
        return view('admin.products.edit', ['product' => $product[0], 'statuses' => self::AVAILABLE_STATUS, 'specs' => Spec::all(), 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['slug'] = str_replace(' ', '-', $request->safe()->name);
            $product->update($data);
            $product->specs()->detach($request->product_id);
            $product->storeSpecs($request->safe()->specs);
            $media = $product->getMedia('products');
            for ($i = 0; $i < count($media); $i++) {
                $id = $request->oldimages[$i]['id'] ?? null;
                if ($media[$i]->id == $id) {
                    $media[$i]->delete();
                }
            }
            if (isset($request->safe()->images[0])) {
                foreach ($request->safe()->images as $image) {
                    $product->addMedia($image['file_name'])->toMediaCollection('products');
                }
            }
            DB::commit();
            return redirect()->route('products.index')->with(['success' => 'تمت العمليه بنجاح']);
        } catch (\Exception $e) {
            dd($e->getMessage());
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
    public function destroy(Product $product)
    {
        DB::beginTransaction();
        try {
            $product->delete();
            DB::commit();
            return redirect()->route('products.index')->with(['success' => 'تمت العمليه بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'فشلت العمليه ']);
        }
    }
}
