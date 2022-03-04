<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index(){
        $route = Route::currentRouteName();
        if (Gate::allows('product', $route)) {
        return view('backend.roles.list',[
            'list' => Role::all(['id','name','slug','permission','updated_at'])
        ]);
        }
        abort(403);
    }


    public function getEdit(Role $role){
        return view('backend.roles.edit',[
            'role' => $role
        ]);
    }

    public function postEdit(Request $request, Role $role){

        $per =json_encode( explode(',',$request->permission));
       
        $role->fill([
            'name' => $request->name,
            'slug' => $request->slug,
            'permission' => $per,
        ]);
        $role->save();
        return redirect()->back();
    }
    public function getAdd(){
        $route = Route::currentRouteName();
        if (Gate::allows('product', $route)) {
        return view('backend.roles.form');
        }
        abort(403);
    }
    public function postAdd(Request $request){
        $per =json_encode( explode(',',$request->permission));
        Role::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'permission' => $per,
        ]);
        return redirect()->back();
   }
}
