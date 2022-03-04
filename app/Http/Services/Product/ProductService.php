<?php
namespace App\Http\Services\Product;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class ProductService {

    public function getMenu()
    {
        return Menu::where('status', 1)->get();
    }

    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('sale_off') != 0
            && $request->input('sale_off') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('sale_off') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }


    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);

        if ($isValidPrice === false) return false;
        if ($request->hasFile('image')) {
            $image = $request->file('image');            
            $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('upload\images\thumb');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(300, 300, function($constraint){
                 $constraint->aspectRatio();
            })->save($destinationPath . '\\' . $imageName);
            $destinationPath = public_path('upload\images\product');
            $image->move($destinationPath, $imageName);
        }
       
        try {
            $request->except('_token');
            $product = Product::create([
                'name'  => $request->name,
                'slug_product'  => Str::slug($request->name),
                'description'  => $request->description,
                'content'  => $request->content,
                'price'  => $request->price,
                'sale_off'  => $request->sale_off,
                'status'  => $request->status,
                'is_home'  => $request->is_home,
                'new'  => $request->new,
                'image' => $imageName
            ]);
            if($request->menu_id){
               // dd($product->id);
               $product->menus()->attach($request->menu_id);
            }
            Session::flash('messages', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            return  false;
        }

        return  true;
    }

    public function get()
    {
       
        return Product::with('menus')
            ->orderByDesc('id')->get();
    }


    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;
        if ($request->hasFile('image')) {
            
            $image = $request->file('image');            
            $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('upload\images\thumb');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(300, 300, function($constraint){
                 $constraint->aspectRatio();
            })->save($destinationPath . '\\' . $imageName);
            $destinationPath = public_path('upload\images\product');
            $image->move($destinationPath, $imageName);
            

            #delete old image
            $image_old = base_path('public/upload/images/product/'.$product->image);
            if (File::exists($image_old)) {
                unlink($image_old);
            }
            $thumb_old = base_path('public/upload/images/thumb/'.$product->image);
            if (File::exists($thumb_old)) {
                unlink($thumb_old);
            }
        }else{
            $imageName = $request->image;
        }
        
        try {
            
            $product->fill([
                'name'  => $request->name,
                'slug_product'  => Str::slug($request->name),
                'description'  => $request->description,
                'content'  => $request->content,
                'price'  => $request->price,
                'sale_off'  => $request->sale_off,
                'status'  => $request->status,
                'is_home'  => $request->is_home,
                'new'  => $request->new,
                'image' => $imageName
            ]);
            
            $product->save();
            $product->menus()->sync($request->menu_id);
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request )
    {
        $product = Product::where('id', $request->id)->first();
       
        $arrID = [];
        foreach ($product->menus as $value) {
            $arrID [] = $value->id;
        }
        #delete gallery
       
        if ($product) {
            $gallery = $product->gallery;
            if (count($gallery)>0) {
               foreach ($gallery as $key => $value) {
                    $image_old = base_path('public/'.$value->image);
                    if (File::exists($image_old)) {
                        unlink($image_old);
                    }
               }
            }
            $product->menus()->detach($arrID);
            $image_old = base_path('public/upload/images/product/'.$product->image);
            $thumb_old = base_path('public/upload/images/thumb/'.$product->image);
            if (File::exists($image_old)) {
                unlink($image_old);
            }
            if (File::exists($thumb_old)) {
                unlink($thumb_old);
            }
            $product->delete();
            return true;
        }

        return false;
    }
}