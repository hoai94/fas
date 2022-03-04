<?php
namespace App\Http\Services\Product;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\File;
class ProductFrontendService {

    public function get()
    {
        return Product::select('id', 'name', 'price', 'sale_off', 'image','is_home','slug_product')
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
    public function getProductIsHome()
    {
        return Product::select('id', 'name', 'price', 'sale_off', 'image','is_home','slug_product')
            ->where('is_home',1)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
    public function show($id)
    {
        return Product::where('id', $id)
            ->where('status', 1)
            ->with('menu')
            ->firstOrFail();
    }

}