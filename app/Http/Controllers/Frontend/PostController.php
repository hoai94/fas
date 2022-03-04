<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\IncrementView;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    public function index (){
        $post = Post::where('status',1)->orderByDesc('id')->get();
        
        return view('frontend.post.list',[
            'post' => $post,
            'author' => User::all(['id','name']),
            'postNew' => Post::where(['status' => 1 , 'new' => 1])->orderByDesc('id')->limit(5)->get(),
            'postPopular' => Post::where('status' , 1 )->orderByDesc('reads')->limit(5)->get(),
        ]);
    }

    public function detail ($slug){
        $post = Post::where('slug',$slug)->firstorfail();
      //  $post->incrementReadCount();

        IncrementView::dispatch($slug)->delay(now()->addMinutes(3));
        return view('frontend.post.detail',compact('post'));
    }
}
