<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('status', '1')->where('category_id' , $category->id)->withCount('inquiries')->limit(20)->get();
        $categories  = Category::all();

        return view('web.products', compact('products', 'categories'));
    }

    public function details(int $id, Request $request)
    {
        $product = Product::findOrFail($id);
        $specs = Product::where('id', $product->id)->with('specs')->get()[0]->specs;
        $categories  = Category::all();
        return view('web.details', compact(['product', 'specs' , 'categories']));
    }

    public function search(Request $request)
    {
        $request->validate([
            'key' => ['required', 'string']
        ]);
        $products = Product::where('name', 'LIKE', "%$request->key%")->where('status', '1')->withCount('inquiries')->get();
        $htmlData  = '';
        foreach ($products as $product) {
            $img = asset($product->getFirstMediaUrl('products'));
            $textQuantity = $product->quantity  > 1 ? "من الوحدات" : "وحده";
            $htmlData .= "<div class=\"col-lg-4 product-item\">
            <div class=\"blog-item\">
                <div class=\"blog-img\">
                    <a ><img src=\"$img\" alt=\"Image\"></a>
                    <div class=\"show_detials\">
                        <p><a href=" .  route('details', $product->id) . " class=\"btn btn-danger \"> عرض المزيد</a></p>
                    </div>
                </div>
                <div class=\"blog-text text-right\">
                    <h3><a href=" .  route('details', $product->id) . "> $product->name </a></h3>
                    <p>
                        $product->description
                    </p>
                </div>
                <div class=\"blog-meta\">
                    <p class=\"text-right\">
                        <a>
                            <i class=\"fas fa-money-bill-wave\"></i>
                            <span >$product->price  جنيه </span>
                        </a>
                    </p>
                    <p class=\"text-right\">
                        <a >
                            <i class=\"fas fa-shopping-basket  \"></i>
                            <span >$product->quantity $textQuantity
                           </span>
                        </a>
                    </p>
                    <p class=\"text-right\">
                        <a >
                            <i class=\"fa fa-comments \"></i>
                            <span >$product->inquiries_count</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>";
        }
        if (count($products) == 0) {
            $htmlData = "    <div class='col-10 col-md-9 mx-auto text-center'>
            <h2 class='text-danger'>لا يوجد نتائج لعرضها</h2> 
            </div>";
        }
        return response()->json(['htmlData' => $htmlData]);
    }
}
