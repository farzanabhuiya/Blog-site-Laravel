

<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FronCategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\FrontendController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




Route::get('/',[HomeController::class, 'homepage'])->name('frontend');
Route::get('/category/{slug}',[FrontendController::class, 'getPostCategory'])->name('category.all');
//Route::get('/category/{slug}',[HomeController::class, 'getPostCategory'])->name('category.all');
Route::get('/blogs/{slug}',[HomeController::class, 'singleBlog'])->name('blog.single');
Route::post('/comments',[CommentController::class,'storeComment'])->name('comment.store');
//Route::get('/fronCategory/{slug}',[FronCategoryController::class,'fronCategory'])->name('category.frontend');







//Auth::routes();
