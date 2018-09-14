<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::pluck("name", "id");
        return view('/admins/products/index')->with('products', $products)->with('categories', $categories);
    }

    public function create(){
        $categories = Category::pluck('name', 'id');

        return view('/admins/products/create')->with('categories', $categories);
    }

    public function store(ProductFormRequest $request){
        $product = new Product;
        $this->get_infor_product($product, $request);

        if($product->save()){
            $request->file('image')->storeAs('image', $request->file('image')->getClientOriginalName());
            Session::flash('message', 'Create success new product');
            Session::flash('alert-class', 'alert-success');

            return redirect('/admins/products');
        }

    }

    public function show($id){
        $product = Product::find($id);
        $categories = Category::pluck("name", "id");

        if(!is_null($product)){
            return view('admins/products/show')->with('product', $product)->with("categories", $categories);
        }else{
            Session::flash('message', 'Category doesn\'t exist');
            Session::flash('alert-class', 'alert-warning');

            return redirect('admins/products');
        }
    }

    public function edit($id){
        $categories = Category::pluck('name', 'id');
        $product = Product::find($id);

        if(!is_null($product)){
            return view('admins/products/edit')->with('data', ['product' => $product, 'categories' => $categories]);
        }else{
            Session::flash('message', 'Category doesn\'t exist');
            Session::flash('alert-class', 'alert-warning');

            return redirect('admins/products');
        }
    }

    public function update($id, ProductFormRequest $request){
        $product = Product::find($id);

        if(!is_null($product)){
            $this->get_infor_product($product, $request);

            if($product->save()){
                $request->file('image')->storeAs('image', $request->file('image')->getClientOriginalName());
                Session::flash('message', 'Update success this product');
                Session::flash('alert-class', 'alert-success');

                return redirect('admins/products/' . $product->id);
            }
        }else{
            return redirect('admins/products');
        }

    }

    public function ajax(Request $request){
        $status = $request->status;
        if($status == 2){
            $products = Product::all();
        }else{
            $products = Product::where('status', $status)->get();
        }

        return $products;
    }

    private function get_infor_product(Product $product, ProductFormRequest $request){
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->image = $request->file('image')->getClientOriginalName();
        $product->description = $request->description;
        $product->item = $request->item;
        $product->status = $request->status;
        $product->promotion = $request->promotion;
        $product->color = $request->color;
        $product->warranty = $request->warranty;
        $product->condition = $request->condition;
        $product->slug = str_slug($request->name);
        $product->featured = $request->featured;

        return $product;
    }
}
