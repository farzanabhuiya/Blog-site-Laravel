<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCatagory extends Model
{
    use HasFactory;

    function Category(){
        return $this->belongsTo(Category::class);
    }

    function posts(){
        return $this->hasMany(Post::class);
    }

}
