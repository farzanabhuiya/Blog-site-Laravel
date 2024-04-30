<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SubCatagory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   
function getPostCategory($slug){
    $posts = Post::whereHas('category', function($q) use($slug){
       $q->where('slug',$slug);
      })
      ->orWhereHas('SubCatagory', function($q) use($slug){$q->where('slug',$slug);})
      ->get();
//  dd($posts);
      return view ('frontend.fronCategory',compact('posts'));
  }

}
