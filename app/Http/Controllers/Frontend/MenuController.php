<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Models\Products;
use App\Http\Services\Product\ProductFrontendService;

class MenuController extends Controller
{
    protected $menu;
    protected $product;
    public function __construct(MenuService $menu, ProductFrontendService $product)
    {
        $this->menu = $menu;
        $this->product = $product;
    }
    public function index($slug, Request $req)
    {
        $sort = $req->sort ? $req->sort : 'desc';
        return view('frontend.menu.list', [
            'title'       => $this->menu->getMenu($slug),
            'listProduct' => $this->menu->getProduct($slug, $sort),
            'productsFeature' => $this->product->getProductIsHome(),
        ]);
    }
    public function ajaxLoadMoreMenu(Request $req)
    {
        if ($req->ajax()) {
            if ($req->id > 0) {
                $data   = Menu::select('name','id','slug')->where('id', '<', $req->id)->orderBy('id', 'DESC')->limit(5)->get();
            } else {
                $data   = Menu::select('name','id','slug')->orderBy('id', 'DESC')->limit(5)->get();
            }
            $output = '';
            $last_id = '';
            if (!$data->isEmpty()) {
                foreach ($data as $menu) {
                    $output .= '
                                <div class="custom-control custom-checkbox collection-filter-checkbox pl-0 category-item">
                                    <a class="my-text-primary" href="/danh-muc/'.$menu->slug.'">'.$menu->name.'</a>
                                </div>
                                ';
                    $last_id = $menu->id;
                }
                $output .=  '<div >
                                <button type="button"  name="load_more_button" 
                                class="btn btn-outline-dark" data-id="' . $last_id . '" 
                                id="load_more_button">Xem thêm</button>
                            </div>';
            }
            else
            {
                $output .= '
                <div >
                    <button class="text-dark font-weight-bold" 
                    type="button" class="btn btn-outline-dark" 
                    name="load_more_button"">Xem thêm</button>
                </div>
                ';
            }
            echo $output;
        }
    }
}
