<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }
    public function getAdd(){
        $route = Route::currentRouteName();
        if (Gate::allows('product', $route)) {
        return view('backend.sliders.form');
        }
        abort(403);
    }
    public function postAdd(Request $request){
        
        $this->slider->insert($request);

        return redirect()->back();
    }
    public function index(){
        return view('backend.sliders.list',[
            'sliders' => $this->slider->get(),
        ]);
    }

    public function getEdit (Slider $slider){
        $route = Route::currentRouteName();
        if (Gate::allows('product', $route)) {
        return view('backend.sliders.edit',[
            'slider' => $slider,
        ]);
        }
        abort(403);
    }
    public function postEdit (Request $request,Slider $slider){
        
        $result = $this->slider->update($request, $slider);
        if ($result) {
            return redirect('/backend/list-slider');
        }

        return redirect()->back();
    }
    public function destroy (Request $request){
        $result = $this->slider->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công slider'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

    public function ajaxActive(Slider $slider){
        $slider->status = 1;
        $slider->save();
        return response()->json([
            'link' => route('ajax.unactive.slider',['slider' => $slider->id]),
            'status' => 1,
        ]);
    }

    public function ajaxUnactive(Slider $slider){
        $slider->status = 0;
        $slider->save();
        return response()->json([
            'link' => route('ajax.active.slider',['slider' => $slider->id]),
            'status' => 0,
        ]);
    }
}
