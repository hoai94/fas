<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $products = Product::where('is_home', 1)->get();
        $productsNew = Product::where('new', 1)->get();
        $slider   = Slider::select('name','image','url')->whereRaw('`status` = 1 and `banner` = 0')->get();
        $banner   = Slider::select('name','image','url')->whereRaw('`status` = 1 and `banner` = 1')->get();
        return view('frontend.index.content',[
            'products' => $products,
            'productsNew' => $productsNew,
            'slider' => $slider,
            'banner' => $banner,
        ]);
    }
}
