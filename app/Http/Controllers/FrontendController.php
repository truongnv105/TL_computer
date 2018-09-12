<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class FrontendController extends Controller
{
    public function getHome(){
        $data['featured'] = Product::where('featured', 1)->orderBy('id', 'desc')->get();
        $data['new'] = Product::orderBy('id', 'desc')->take(8)->get();
        return view('frontend.home', $data);
    }

    public function getDetails($id){
        $data['item'] = Product::find($id);
        return view('frontend.details', $data);
    }

    public function getCategory($id){
        $data['catename'] = Category::find($id);
        $data['items'] = Product::where('category_id', $id)->orderBy('id','desc')->paginate(4);
        return view('frontend.category', $data);
    }
}
