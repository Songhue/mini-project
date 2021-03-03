<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];

    // I want all post, category id = 1
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_categories', 'category_id', 'post_id');

    }
}
