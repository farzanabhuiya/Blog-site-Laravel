<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCatagory;


use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
function homepage(){


 $popularPosts =Post::with('Category:id,title,slug')->with('user:id,name,profile_img')
 ->latest()
 ->select('id','title','slug','user_id','category_id','is_popular','featured_img','created_at')
 ->where('is_popular',1)->take(1)->get();
 



// all post

$posts =Post::with('category')->with('user')->
latest()->paginate(4);

$popularcategories = Category::withcount('posts as totalcount')->latest()->take(6)->get();
  return view('frontend.homepage', compact('popularPosts','posts','popularcategories'));

}


//function getPostCategory($slug){
  //$posts = Post::whereHas('category', function($q) use($slug){
     //$q->where('slug',$slug);
   // })
   // ->orWhereHas('SubCatagory', function($q) use($slug){$q->where('slug',$slug);})
   // ->get();


//}




function singleBlog($slug){
  $post = Post::withcount('comments as totalcomments')
  ->with('comments')
  ->with(['user:id,name,profile_img','Category:id,title,slug'])->where('slug',$slug)->first();

  $popularcategories = Category::withcount('posts as totalcount')->latest()->take(6)->get();

 return view('frontend.singleBlog', compact('post','popularcategories'));

}
}
