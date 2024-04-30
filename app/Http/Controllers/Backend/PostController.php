<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCatagory;
use Illuminate\Http\Request;
use App\Http\Helpers\slugGenerator;
use App\Models\Post;
use App\Http\Helpers\MediaUpload;

class PostController extends Controller
{
  use slugGenerator, MediaUpload;

    function addPost(){
        $categories = Category:: latest()->get();
        $subcategories = SubCatagory:: latest()->get();
        return view('backend.posts.addPost',compact('categories','subcategories'));
    }

    function storePost(Request $request){
      //dd($request->all());
      // $fileName= $this->generateslug($request->title, Post::class). "." .$request->featured_img->extension();
      //$upload = $request->featured_img->storeAS('posts', $fileName,'public');
      $title = $this->generateslug($request->title,Post::class);
      $fileName=$this->uploadSingleMedia($title, $request->featuredImg);
    
      
       
       $post= new Post();
       $post->title = $request->title;
       //$post->slug = $title; 
      $post->slug = $request->title;
       $post->user_id =auth()->user()->id;
       $post->category_id = $request->category;
       $post->sub_catagory_id = $request->subcatagory;
       $post->featured_img =$fileName;
       $post->content= $request->content;
       $post->save();
       return back();
    }


    function getAllPost(){
      $posts= Post::where('user_id', auth()->user()->id)->get();
      return view('backend.Posts.allPost',compact('posts'));
    }


    function updateStatus(Request $request){

      $post = Post::find($request->id);
                 if( $post->is_popular == 0){
                  $post->is_popular = 1;
                  $post->save();
                  return'success';
                 }else{
                  $post->is_popular = 0;
                  $post->save();
                  return'false';
                 }
      //return view('testing');
    }
}
