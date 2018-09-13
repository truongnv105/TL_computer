<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class FrontendController extends Controller
{
    public function getHome(){
        $data['featured'] = Product::where('featured', 1)->orderBy('id', 'desc')->take(8)->get();
        $data['new'] = Product::orderBy('id', 'desc')->take(8)->get();
        return view('frontend.home', $data);
    }

    public function getDetails($id){
        $data['item'] = Product::find($id);
        $data['comments'] = Comment::where('com_product',$id)->get();
        return view('frontend.details', $data);
    }

    public function getCategory($id){
        $data['catename'] = Category::find($id);
        $data['items'] = Product::where('category_id', $id)->orderBy('id','desc')->paginate(4);
        return view('frontend.category', $data);
    }

    public function postComment(Request $request,$id){
        $comment = new Comment;
        $comment->com_name = $request->name;
        $comment->com_email = $request->email;
        $comment->com_content = $request->content;
        $comment->com_product = $id;
        $comment->save();

        return back();
    }

    public function getSearch(Request $request){
        $result = $request->result;
        $data['keyword'] = $result;
        $result = str_replace(' ', '%', $result);
        $data['items'] = Product::where('name', 'like', '%'.$result.'%')->get();

        return view('frontend.search', $data);
    }
}
