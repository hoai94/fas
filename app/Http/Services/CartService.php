<?php
namespace App\Http\Services;


use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendMailOrder;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailOrder;

class CartService
{
    public function create($request )
    {
        $qty = (int)$request->input('qty') ? (int)$request->input('qty') : 1;
        $product_id = (int)$request->input('product_id') ? (int)$request->input('product_id') : $request->id;

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'sale_off', 'image','slug_product')
            ->where('status', 1)
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('qty'));

        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request)
    {

        $carts = Session::get('carts');

        if (is_null($carts))
            return false;
        $customer    = Auth::guard('customer')->user();
        $customer_id = Auth::guard('customer')->user()->id;
        //Mail::to(Auth::guard('customer')->user()->email)->later(now()->addMinutes(10), new MailOrder());;
        $this->infoProductCart($carts, $customer_id);

        $products = $this->getOrderDetail();

        SendMailOrder::dispatch($products ,$customer,$carts)->delay(now()->addMinutes(1));
        
        Session::forget('carts');

        return true;
    }

    protected function infoProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'sale_off', 'image')
            ->where('status', 1)
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'qty'   => $carts[$product->id],
                'price' => $product->sale_off != 0 ? $product->sale_off : $product->price
            ];
        }

        return Cart::insert($data);
    }

    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }

    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'image');
        }])->get();
    }
    public function getOrderDetail(){
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'sale_off')
            ->where('status', 1)
            ->whereIn('id', $productId)
            ->get();
        return $products;
    }
}
