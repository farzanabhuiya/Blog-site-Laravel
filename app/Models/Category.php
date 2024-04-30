<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   
    //hasmany holo akjoner upor  onek aca ba thaka 
    //hasmany
    //belong holo karo ender/karo upor thaka 
    //belong

    use HasFactory;
    function subcatagories(){
        return $this->hasMany(SubCatagory::class);
    }

   

    function posts(){
        return $this->hasMany(Post::class);
    }

}
