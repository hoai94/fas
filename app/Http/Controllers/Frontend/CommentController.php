<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request){
        
        if($comment = Comment::create([
            'user_id' => Auth::guard('customer')->user()->id,
            'post_id' => $request->post_id,
            'content' => $request->content,
            'reply_id' => $request->reply_id ? $request->reply_id : 0,
        ])){
            $comments = Comment::where([
                    'post_id'  => $request->post_id,
                    'reply_id' => 0,
            ])->orderBy('id', 'DESC')->get();
            return view('frontend.post.comment',compact('comments'));
        }
    }
}
