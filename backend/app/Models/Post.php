<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title','content','slug','status','category_id','user_id','is_approved'];
    
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post){
            if($post->title) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
