<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryFormRequest;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('admins/categories/index')->with('categories', $categories);
    }

    public function create(){
        return view('admins/categories/create');
    }

    public function store(CategoryFormRequest $request){
        $category = new Category;

        $category->name = $request->name;
        $category->slug = $request->slug;

        if($category->save()){
            return redirect('/admins/categories');
        }
    }

    public function show($id){
        $category = Category::find($id);

        if(!is_null($category)){
            $products = $category->products;
            return view('admins/categories/show')->with('data', ['category' => $category, 'products' => $products]);
        }else{
            return redirect('admins/categories');
        }
    }

    public function edit($id){
        $category = Category::find($id);

        if(!is_null($category)){
            return view('admins/categories/edit')->with('category', $category);
        }else{
            return redirect('admins/categories');
        }
    }

    public function update($id, CategoryFormRequest $request){
        $category = Category::find($id);

        if(!is_null($category)){
            $category->name = $request->name;
            $category->slug = $request->slug;


            if($category->save()){
                return redirect('admins/categories');
            }
        }else{
            return redirect('admins/categories');
        }
    }
}
