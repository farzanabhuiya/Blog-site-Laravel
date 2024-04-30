<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Helpers\slugGenerator;
use Illuminate\Http\Request;
use App\Models\Category;



class CategoryController extends Controller
{
    
    use slugGenerator;
  
    function viewCategory(){
       $categories = Category::latest()->paginate(5);
       $edit = null;
       return view('backend.categories.viewCategory',compact('categories','edit'));
    }
    function storeCategory(Request $request){
    
        $category = new Category();
        $category->title= $request->title;
        $category->slug = $this->generateslug($request->title,category:: class);
        $category->save();
        return back();
    }

    function editCategory($slug){
        $categories = Category::latest()->paginate(5);

       $edit= Category::where('slug',$slug)->first();
       return view('backend.categories.viewCategory',compact('categories','edit'));
    }
    function updateCategory(Request $request,$slug){
        $edit= Category::where('slug',$slug)->first();
        $edit->title = $request->title;
        $edit->save();
        return back();
    }
    

    function deleteCategory($id){
       Category::find($id)->delete();
       return back();
    }
}
