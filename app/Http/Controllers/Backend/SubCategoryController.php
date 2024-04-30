<?php


namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCatagory;
use Illuminate\Http\Request;
use App\Http\Helpers\slugGenerator;


class SubCategoryController extends Controller
{
     use slugGenerator;

    function viewSubCategory(){
        $subCatagories = SubCatagory::with('category')->get();
        $categories = Category::with('subcatAgories')->select('id','title')->latest()->get();
       return view('backend.categories.viewSubCategory', compact('categories','subCatagories'));
    }

    function storeSubCategory( Request $request){
        $sub =  new SubCatagory();
        $sub->category_id = $request->category_id;
        $sub->title = $request->title;
        $sub->slug = $this->generateslug($request->title, SubCatagory::class);
        $sub->save();
        return back();

    }
     
     function getSubCategory( Request $request)
     {
        //return $request->categoryId;
        $subCatagories= SubCatagory::where('category_id', $request->categoryId)->get();
        return $subCatagories;
     }
}
