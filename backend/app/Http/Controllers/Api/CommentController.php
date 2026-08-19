<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index($postId){
        $comment = Comment::with('user_id','name')
        ->where('post_id',$postId)
        ->where('is_approved',true)
        ->latest()
        ->get();
        return response()->json($comments);
    }
    public function store(Request $request){
        $request->validate([
            'post_id'=>'required|exists:post_id',
            'comment'=>'required|string|max:1000',
        ]);

        $comment = Comment::crate([
            'post_id'=>$request->post_id,
            'user_id'=>$request->user()->id,
            'comment'=>$request->comment,
            'is_approved'=>false
        ]);
        return response()->json([
            'message'=>'Yorumunuz alındı. Admin Onayını bekleyiniz.',
            'comment'=>$comment
        ],201);
    }
}
//201 craeted