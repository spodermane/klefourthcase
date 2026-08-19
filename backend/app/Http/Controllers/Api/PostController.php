<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['category','user'])
        ->where('is_approved',true)
        ->where('status','active');
        
        if($request->has('search')) {
            $query->where('title','like','%' . $request->search . '%');
        }
        if($request->has('category_id')){
            $query->where('category_id',$request->category_id);
        }
        if($request->has('user_id')){
            $query->where('user_id',$request->user_id);
        }
        if($request->has('date')){
            $query->whereDate('created_at',$request->date);
        }
        $posts = $query->latest()->paginate(10);
        return response()->json($posts);
    }
    public function show($slug){
        $post = Post::with(['category','user'])
        ->where('slug',$slug)
        ->where('is_approved',true)
        ->firstOrFail();
        return response()->json($post);
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'content' =>'required|string',
            'category_id'=> 'required|exists:categories,id',
            'image'=>'nullable|image|max:2048',

        ]);

        $slug = Str::slug($request->title) . '-'. time();

        $imagePath = null;
        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('posts','public');
        }
        $post = Post::create([
            'title'=>$request->title,
            'slug'=>$slug,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'user_id'=> $request->user()->id,
            'image'=> $imagePath,
            'status'=>'draft',
            'is_approved'=>false
        ]);
        return response()->json([
            'message'=>'Yazı başarıyla oluşturuldu. Admin onayını bekleyiniz.',
            'post'=>$post
        ],201);
    }
}
//201 Created
