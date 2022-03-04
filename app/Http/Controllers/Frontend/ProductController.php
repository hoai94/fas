<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function detailProduct ($slug){
        $detailProduct      = Product::select('id','name','description','image','content','sale_off','price','slug_product')->where('slug_product',$slug)->first();
        $featureProducts    = Product::select('id','name','image','sale_off','price','slug_product')->where('is_home',1)->limit(6)->get();
        $menus        = $detailProduct->menus;
        $arrID = [];
        foreach ($menus as $key => $value) {
            $arrID [] = $value->id;
        }
        $pro = Menu::where('id',$arrID)->first();
        $productRelate      = $pro->getProduct;
       //dd( $detailProduct->gallery);
        
        return view('frontend.product.detail',[
            'detailProduct'     => $detailProduct,
            'featureProducts'    => $featureProducts,
            'productRelate'    => $productRelate,
        ]);
    }
}
