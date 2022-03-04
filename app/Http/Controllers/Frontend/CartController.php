<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService; 
use Illuminate\Support\Facades\Session;
use App\Models\Product;
class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function add(Request $request){
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }
        // $carts = Session::get('carts');
        // dd($carts);

        return redirect('/gio-hang.html');
    }
    public function getProduct(){
        $products = $this->cartService->getProduct();
        return view('frontend.cart.list',[
            'products' => $products,
            'carts' => Session::get('carts'),
        ]);
    }
    public function update (Request $request){
        $this->cartService->update($request);

        return redirect('/gio-hang.html');
    }
    public function remove ($id){
        $this->cartService->remove($id);

        return redirect('/gio-hang.html');
    }
    public function order (){
        $products = $this->cartService->getProduct();
        return view('frontend.cart.order',[
            'products' => $products,
            'carts'    => Session::get('carts'),
        ]);
    }
    public function postOrder (Request $request){
        $products = $this->cartService->addCart($request);
        return redirect('/trang-chu.html');
    }
    public function ajaxAddCart (Request $request){
        $addCart = $this->cartService->create($request);
        $total = session('carts');
        $result['cart_total']  = count($total);
        echo json_encode($result,JSON_UNESCAPED_UNICODE);
     }
}
