<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Services\PostService;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;


class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }


    public function index()
    {

        return view('backend.post.list', [
            'posts' => Post::all(['id', 'title', 'thumb', 'description', 'status', 'updated_at', 'user_id', 'new']),
            'author' => User::all(['id', 'name'])
        ]);
    }
    public function getAdd()
    {
        $route = Route::currentRouteName();
        if (Gate::allows('product', $route)) {
            return view('backend.post.form');
        }
        abort(403);
    }
    public function postAdd(Request $request)
    {

        $result = $this->postService->insert($request);

        return redirect()->back();
    }

    public function getEdit(Post $post)
    {
        $route = Route::currentRouteName();
        if (Gate::allows('product', $route)) {
            return view('backend.post.edit', [
                'post' => $post
            ]);
        }
        abort(403);
    }
    public function postEdit(Post $post, Request $request)
    {
        dd($request->all());
    }
    public function destroy(Request $request, Post $post)
    {
        $result = $this->postService->delete($request, $post);
        if ($result) {
            return redirect('/backend/list-post');
        }

        return redirect()->back();
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            Session::push('image', $fileName);
            $request->file('upload')->move(public_path('upload\post'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = '/upload/post/' . $fileName;

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";
            echo $response;
        }
    }
    //change status ajax
    public function ajaxActive(Post $post)
    {
        $post->status = 1;
        $post->save();
        return response()->json([
            'link' => route('ajax.unactive.post', ['post' => $post->id]),
            'status' => 1,
        ]);
    }

    public function ajaxUnactive(Post $post)
    {
        $post->status = 0;
        $post->save();
        return response()->json([
            'link' => route('ajax.active.post', ['post' => $post->id]),
            'status' => 0,
        ]);
    }


    public function ajaxNew(Post $post)
    {
        $post->new = 1;
        $post->save();
        return response()->json([
            'link' => route('ajax.old.post', ['post' => $post->id]),
            'new' => 1,
        ]);
    }
    public function ajaxOld(Post $post)
    {
        $post->new = 0;
        $post->save();
        return response()->json([
            'link' => route('ajax.new.post', ['post' => $post->id]),
            'new' => 0,
        ]);
    }
}
