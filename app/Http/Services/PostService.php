<?php
namespace App\Http\Services;


use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostService
{
    public function insert($request )
    {
        if($request->hasFile('thumb')){
            $originName = $request->file('thumb')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('thumb')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('thumb')->move(public_path('upload\post'), $fileName);

        }
        $fileName = 'upload/post/'.$fileName;
        $image = Session::get('image');
        $post = Post::create(
            [
                'title' => $request->title,
                'body' => $request->body,
                'slug' => Str::slug($request->title),
                'image'=> json_encode($image),
                'status' => $request->status,
                'user_id' => Auth::user()->id,
                'thumb'   => $fileName,
                'description'   => $request->description,
            ]
        );
        Session::forget('image');

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'sale_off', 'image')
            ->where('status', 1)
            ->whereIn('id', $productId)
            ->get();
    }

    public function delete($request , $post)
    {
        $arrImage = [];
        foreach (json_decode($post->image) as $value) {
            $arrImage [] = $value;
        }
        
        
        if (!Empty($arrImage)) {   
            
            foreach ($arrImage as $key => $value) {
                $imageName = base_path('public/upload/post/'.$value);
                if (File::exists($imageName)) {
                    unlink($imageName);
                }
            }
        }
        if (File::exists(base_path('public/'.$post->thumb))) {
            unlink(base_path('public/'.$post->thumb));
        }
        $post->delete();
        return true;
    }
}
