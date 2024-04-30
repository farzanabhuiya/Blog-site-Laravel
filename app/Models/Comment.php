<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    function post(){
        return $this->belongsTo(Post::class);
    }

    function user(){
        return $this->belongsTo(user::class);
    }

    function replies(){
        return $this->hasMany(Comment::class,'parent_id');
    }
}

