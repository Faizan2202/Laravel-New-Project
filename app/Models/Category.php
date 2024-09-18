<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','user_id'];

    function Page(){
        return $this->hasMany(Page::class);
        
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
