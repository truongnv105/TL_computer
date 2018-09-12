<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductFormRequest;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('/admins/products/index')->with('products', $products);
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
            return redirect('/admins/products');
        }

    }

    public function show($id){
        $product = Product::find($id);

        if(!is_null($product)){
            return view('admins/products/show')->with('product', $product);
        }else{
            return redirect('admins/products');
        }
    }

    public function edit($id){
        $categories = Category::pluck('name', 'id');
        $product = Product::find($id);

        if(!is_null($product)){
            return view('admins/products/edit')->with('data', ['product' => $product, 'categories' => $categories]);
        }else{
            return redirect('admins/products');
        }
    }

    public function update($id, ProductFormRequest $request){
        $product = Product::find($id);

        if(!is_null($product)){
            $this->get_infor_product($product, $request);

            if($product->save()){
                $request->file('image')->storeAs('image', $request->file('image')->getClientOriginalName());
                return redirect('admins/products/' . $product->id);
            }
        }else{
            return redirect('admins/products');
        }

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
        $product->slug = $request->slug;
        $product->featured = $request->featured;

        return $product;
    }
}
