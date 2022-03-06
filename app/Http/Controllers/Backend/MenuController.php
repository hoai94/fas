<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function getAdd (){
        $route = Route::currentRouteName();
        if (Gate::allows('authorized', $route)) {
            return view('backend.menus.form', [
                'title' => 'Thêm Danh Mục Mới',
                'menus' => $this->menuService->getParent()
            ]);
            }
        abort(403);
    }

   
    public function postAdd(Request $request)
    {
        $this->menuService->create($request);
        return redirect()->back();
    }

    public function index()
    {
        $route = Route::currentRouteName();
        $this->authorize('authorized', $route);
        
        return view('backend.menus.list', [
            'title' => 'Danh Sách Danh Mục Mới Nhất',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function getEdit(Menu $menu){

        $route = Route::currentRouteName();
        $this->authorize('authorized', $route);

        return view('backend.menus.edit', [
            'title' => 'Chỉnh Sửa Danh Mục: ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }
    public function postEdit(Menu $menu, Request $request)
    {
       // dd($request->input());
        $this->menuService->update($request, $menu);

        return redirect('/backend/list-menu');
    }

    public function destroy(Request $request): JsonResponse
    {
        
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }


    public function ajaxActive(Menu $menu){
        $menu->status = 1;
        $menu->save();
        return response()->json([
            'link' => route('ajax.unactive.menu',['menu' => $menu->id]),
            'status' => 1,
        ]);
    }

    public function ajaxUnactive(Menu $menu){
        $menu->status = 0;
        $menu->save();
        return response()->json([
            'link' => route('ajax.active.menu',['menu' => $menu->id]),
            'status' => 0,
        ]);
    }
}
