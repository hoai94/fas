<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;
use App\Models\Slider;
use App\Models\User;
use App\Models\Customer;
use App\Http\Services\CartService;

class DashboardController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }
    public function index()
    {
        $countProduct = Product::count('id');
        $countPost = Post::count('id');
        $countUser = User::count('id');
        $countSlider = Slider::count('id');
        $countMenu = Menu::count('id');
        $cart = new CartService;
        $customers   = $cart->getCustomer();
        return view('backend.dashboard.content', compact('countProduct', 'countPost', 'countUser', 'countSlider', 'countMenu', 'customers'));
    }
    public function ajaxDetailOrder(Request $request)
    {
        $customers = Customer::findOrFail($request->id);
        $carts = $this->cart->getProductForCart($customers);
        $total = 0;
        $htmls =    '<div class="customer mt-3">
                        <ul>
                            <li>Tên khách hàng: <strong>' . $customers->name . '</strong></li>
                            <li>Số điện thoại: <strong>' . $customers->phone . '</strong></li>
                            <li>Địa chỉ: <strong>' . $customers->address . '</strong></li>
                            <li>Email: <strong>' . $customers->email . '</strong></li>
                        </ul>
                    </div>';
        $htmls .= ' <div class="carts">
                        <table class="table">
                            <tbody>
                            <tr class="table_head">
                                <th class="column-1">IMG</th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                    </tr>';
        foreach ($carts as $key => $cart) {
            $price = $cart->price * $cart->qty;
            $total += $price;
            $htmls .=   '<tr>
                            <td class="column-1">
                                <div class="how-itemcart1">
                                    <img src="upload/images/thumb/' . $cart->product->image . '" alt="IMG" style="width: 100px">
                                </div>
                            </td>
                            <td class="column-2">' . $cart->product->name . '</td>
                            <td class="column-3">' . number_format($cart->price) . ' VNĐ</td>
                            <td class="column-4">' . $cart->qty . '</td>
                            <td class="column-5">' . number_format($price) . ' VNĐ</td>
                        </tr>';
        }
        $htmls .= '<tr>
                    <td colspan="4" class="text-right">Tổng Tiền</td>
                    <td>' . number_format($total) . ' VNĐ</td>
                </tr>
            </tbody>
            </table>
            </div>';
        return response()->json([
            'carts' => $htmls
        ]);
    }
}
