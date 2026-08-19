<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Tüm Kategorileri göster
    public function index(){
        // Kategorileri json olarak gönder
        $categories = Category::all();
        return response()->json($categories);
    }
    public function show($slug){
        $category = Category::with(['posts'=>function($query) {
            $query->where('is_approved',true)->where('status','active');
        }])
        ->where('slug', $slug)->firstOrFail();
        return response()->json($category);
    }
}
