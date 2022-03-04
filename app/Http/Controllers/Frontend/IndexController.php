<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductFrontendService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Menu;
use Illuminate\Support\Str;
class IndexController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu,
    ProductFrontendService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }
    public function index (){
        $allProInMenu = [];
        $menus  = Menu::where('is_home',1)->get();
        foreach ($menus as $product) {
            $pro = Menu::find($product->id);
            $allProInMenu [$product->id] = $pro->getProductHome;
        }
        return view('frontend.index.content', [
            'title' => 'BestBuy - Quần áo nam nữ',
            'sliders' => $this->slider->show(),
            'products' => $this->product->get(),
            'productsIsHome' => $this->product->getProductIsHome(),
            'menuIsHome' => $menus,
            'allProInMenu' => $allProInMenu,
        ]);
    }

    public function search(Request $request){

        $key     = $request->key;
        $product = Product::select('name','image','slug_product','sale_off','price')->where('name','LIKE','%'.$key.'%')->simplePaginate(15)->withQueryString();
        
       // $product = !empty($product) ? $product : 
        return view('frontend.index.search',['key' => $key, 'products'=> $product]);
    }

    public function quickView(Request $request)
    {
        $product_id = $request->product_id;
        $product    =  Product::where('id', $product_id)->get();
        foreach ($product as $key => $value) {
            $output['product_name'] = $value->name;
            $output['product_picture'] = '<div class="quick-view-img"><img src="upload/images/product/' . $value->image . '" alt=""
            class="w-100 img-fluid blur-up lazyload book-picture"></div>';
            $output['product_price'] = number_format($value->price) . ' VNĐ';
            $output['product_price'] = '<h3 class="book-price">'.number_format($value->sale_off).' ₫ <del>'.number_format($value->price).' ₫</del></h3>';
            $output['product_description'] = $value->description;
            $output['link_detail'] = '<a href="/san-pham/'.Str::Slug($value->name,'-').'.html" class="btn btn-solid mb-1 btn-view-book-detail">Xem chi tiết</a>';
        }
        echo json_encode($output);
    }
   public function contact (){
       return view('frontend.html.contact');
   }
}
