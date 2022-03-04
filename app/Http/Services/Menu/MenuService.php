<?php
namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class MenuService {

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function create($request)
    {
        try {
            Menu::create([
                'name'          => (string)$request->input('name'),
                'parent_id'     => (int)$request->input('parent_id'),
                'description'   => (string)$request->input('description'),
                'status'        => (string)$request->input('status'),
                'is_home'        => (string)$request->input('is_home'),
                'slug'          => Str::slug($request->input('name'))
            ]);

            Session::flash('success', 'Tạo Danh Mục Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }
    public function update($request, $menu): bool
    {
        if ($request->input('parent_id') != $menu->id) {
            $menu->parent_id = (int)$request->input('parent_id');
        }

        $menu->name = (string)$request->input('name');
        $menu->description = (string)$request->input('description');
        $menu->slug = Str::slug($request->input('name'));
        $menu->status = $request->input('status');
        $menu->save();

        Session::flash('success', 'Cập nhật thành công Danh mục');
        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }
    public function show()
    {
        return Menu::select('name', 'id','parent_id')
            ->where('parent_id', 0)
            ->orderbyDesc('id')
            ->get();
    }
    public function getMenuIsHome(){
        return Menu::select('name','id','parent_id')
            ->where('is_home',1)
            ->with('products')
            ->get();
    }
    public function getMenu($slug){
        return Menu::where('slug', $slug)->where('status', 1)->firstOrFail();
    }

    public function getProduct ($slug, $sort){
        $menu=  Menu::where('slug', $slug)->where('status', 1)->firstOrFail();
        return $menu->getProduct($sort)->simplePaginate(20)->withQueryString();
    }
}
