<?php


namespace App\Http\Services\Slider;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
class SliderService
{
    public function insert($request)
    {
         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move(base_path('public\upload\images\slider'), $file->getClientOriginalName());
            $nameImg = 'upload/images/slider/'.$file->getClientOriginalName();
            
        }
        try {
            Slider::create([
                'name'      => $request->name,
                'url'       => $request->url,
                'sort_by'   => $request->sort_by,
                'status'    => $request->status,
                'banner'    => $request->banner,
                'image'     => $nameImg
            ]);
            Session::flash('message', 'Thêm Slider mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Slider LỖI');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function get()
    {
        return Slider::orderByDesc('id')->paginate(15);
    }

    public function update($request, $slider)
    {
        if ($request->hasFile('image')) {
            
            $file = $request->file('image');
            $file->move(base_path('public\upload\images\slider'), $file->getClientOriginalName());
            $nameImg = 'upload/images/slider/'.$file->getClientOriginalName();
            
            #delete old image
            $image_old = base_path('public/'.$slider->image);
            if (File::exists($image_old)) {
                unlink($image_old);
            }
            //dd($image_old);
        }else{
            $nameImg = $request->image;
        }
        try {
            $slider->fill([
                'name'  => $request->name,
                'url'  => $request->url,
                'sort_by'  => $request->sort_by,
                'status'  => $request->status,
                'banner'  => $request->banner,
                'image'  => $nameImg
            ]);
            $slider->save();
            Session::flash('success', 'Cập nhật Slider thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật slider Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();
        if ($slider) {
            $image_old = base_path('public/'.$slider->image);
            if (File::exists($image_old)) {
                unlink($image_old);
            }
            
            $slider->delete();
            return true;
        }

        return false;
    }

    public function show()
    {
        return Slider::where('status', 1)->orderByDesc('sort_by')->get();
    }
}