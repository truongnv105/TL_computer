<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;

class CommentsController extends Controller
{
    public function index(){
        $comments = Comment::all();
        $products = Product::pluck("name", "id");

        return view("admins/comments/index")->with('comments', $comments)->with('products', $products);
    }

    public function destroy($id){
        $comment = Comment::where("com_id", $id);
        $comment->delete();

        return redirect()->back();
    }
}
