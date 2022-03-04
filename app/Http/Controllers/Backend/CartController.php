<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;
class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        return view('backend.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);
        

        return view('backend.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
    public function destroy(Request $request){
        $customer = Customer::findOrFail($request->id);
        $customer->delete();
        if ($customer) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công đơn hàng'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
