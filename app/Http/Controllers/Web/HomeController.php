<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $products = Product::where('status', "1")->orderBy('created_at', 'desc')->withCount('inquiries')->limit(12)->get();
        $categories  = Category::all();
        return view('web.index', compact('products' , 'categories'));
    }
}
