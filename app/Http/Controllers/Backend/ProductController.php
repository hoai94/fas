<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;
class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('backend.products.list', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $this->productService->get()
        ]);
    }

    public function getAdd()
    {
        $route = Route::currentRouteName();
        $this->authorize('authorized', $route);

        return view('backend.products.form', [
            'title' => 'Thêm Sản Phẩm Mới',
            'menus' => $this->productService->getMenu()
        ]);
        
    }
    public function postAdd(ProductRequest $request)
    {
        // dd($request->menu_id);
        $this->productService->insert($request);
        return redirect()->back();
    }

    public function getEdit(Product $product)
    {   
        $route = Route::currentRouteName();
        $this->authorize('authorized', $route);
        
        return view('backend.products.edit', [
            'title' => 'Chỉnh Sửa Sản Phẩm',
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
           
    }

    public function postEdit(EditProductRequest $request, Product $product)
    {
        $result = $this->productService->update($request, $product);

        if ($result) {
            return redirect('/backend/list-product');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'message' => 'Xóa thành công !',
            ]);
        }
        return response()->json([
            'error' => 'Xóa thất bại !',
        ]);
    }


    public function ajaxActive(Product $product){
        $product->status = 1;
        $product->save();
        return response()->json([
            'link' => route('ajax.unactive',['product' => $product->id]),
            'status' => 1,
        ]);
    }

    public function ajaxUnactive(Product $product){
        $product->status = 0;
        $product->save();
        return response()->json([
            'link' => route('ajax.active',['product' => $product->id]),
            'status' => 0,
        ]);
    }


    public function ajaxNew(Product $product){
        $product->new = 1;
        $product->save();
        return response()->json([
            'link' => route('ajax.old',['product' => $product->id]),
            'new' => 1,
        ]);
    }
    public function ajaxOld(Product $product){
        $product->new = 0;
        $product->save();
        return response()->json([
            'link' => route('ajax.new',['product' => $product->id]),
            'new' => 0,
        ]);
    }
}
