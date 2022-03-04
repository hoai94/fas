<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Gallery;
class GalleryController extends Controller
{

    public function getAdd(Request $request , Product $product){
        $arrImage   = [];
        foreach ($product->gallery as $key => $gallery) {
            $arrImage []= $gallery->image;
        }
       // dd($arrImage);
        return view('backend.gallery.form', [
            'product' => $product,
            'gallery' => $arrImage
        ]);
    }

    public function postAdd(Request $request , Product $product)
    {
        // $file = $request->file('image');
        //     $file->move(base_path('public\upload\images'), $file->getClientOriginalName());
        //     $nameImg = 'upload/images/'.$file->getClientOriginalName();
        if ($request->file('image')) {
            foreach ($request->file('image') as $key => $value) {
                $imgName = Str::random(20) . '.' . $value->getClientOriginalExtension();
                
                $value->move(base_path('public\upload\images\product'), $imgName);
                $nameImg = 'upload/images/product/'.$imgName;
    
                $g = Gallery::create(
                    [
                    'image' => $nameImg
                ]);
                $product->gallery()->attach($g->id);
            }
            return redirect()->back();
        }
        
    }
}
