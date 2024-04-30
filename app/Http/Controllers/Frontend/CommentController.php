<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
 function storeComment(Request $request){

    $comment = new Comment();
    $comment->user_id = auth()->user()->id;
    $comment->post_id = $request->post_id;
    $comment->parent_id = $request->parent_id ?? null;
    $comment->content = $request->comment;
    $comment->save();
    return back();
 }
}
