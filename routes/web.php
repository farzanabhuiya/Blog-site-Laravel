<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
   //home page 
Route::get('/',)->name('frontend');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



                                //ProfileController
                                 // *profile route
Route::get('/profile',[ProfileController::class,'showProfile'])->name('profile');
Route::put('/profile-update',[ProfileController::class,'updateProfile'])->name('profile.update');
Route::put('/password-update',[ProfileController::class,'updatepassword'])->name('profile.password.update');




                             ///CategoryController 
                              ///group kora
Route::prefix('/backend/categories')->controller(CategoryController::class)->name('category.')->group(
    function(){
        Route::get('/' ,'viewCategory')->name('show');
        Route::post('/store','storeCategory')->name('store');
        Route::get('/edit/{slug}','editCategory')->name('edit');
        Route::put('/update/{slug}','updateCategory')->name('update');
        Route::delete('/delete/{id}','deleteCategory')->name('delete');
        
    }
);



                          //SubCategoryController group
                             // url,name ,controller

Route::prefix('/backend/sub-categories')->controller(SubCategoryController::class)->name('subcategory.')->group(
    function(){
        Route::get('/' ,'viewSubCategory')->name('view');
        Route::post('/store' ,'storeSubCategory')->name('store');
        Route::get('/get-all-sub-category','getSubCategory')->name('get');

    }
);
//Route::get('/backend/categories',[CategoryController::class ,'viewCategory'])->name('category.show');
//Route::get('/backend/categories/store',[CategoryController::class ,'storeCategory'])->name('category.store');



                                 
                             //PostController group
                             // url,name ,controller
Route::prefix('/backend/post')->controller(PostController::class)->name('post.')->group(function(){
    Route::get('/' ,'addPost')->name('add');
    Route::post('/store' ,'storePost')->name('store');
    Route::get('/all' ,'getAllPost')->name('all');
    Route::get('/status' ,'updateStatus')->name('status');
});



   






