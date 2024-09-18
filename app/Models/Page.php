<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;


class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id', 'category_id'];

    function user(){
        return $this->belongsTo(User::class);
    }
    function category(){
        return $this->belongsTo(Category::class);
    }
}
