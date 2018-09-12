<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\Session;

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
        $this->get_infor_category($category, $request);

        if($category->save()){
            Session::flash('message', 'Create success new category');
            Session::flash('alert-class', 'alert-success');

            return redirect('/admins/categories');
        }
    }

    public function show($id){
        $category = Category::find($id);

        if(!is_null($category)){
            $products = $category->products;
            return view('admins/categories/show')->with('data', ['category' => $category, 'products' => $products]);
        }else{
            Session::flash('message', 'Category doesn\'t exist');
            Session::flash('alert-class', 'alert-warning');

            return redirect('admins/categories');
        }
    }

    public function edit($id){
        $category = Category::find($id);

        if(!is_null($category)){
            return view('admins/categories/edit')->with('category', $category);
        }else{
            Session::flash('message', 'Category doesn\'t exist');
            Session::flash('alert-class', 'alert-warning');

            return redirect('admins/categories');
        }
    }

    public function update($id, CategoryFormRequest $request){
        $category = Category::find($id);

        if(!is_null($category)){
            $this->get_infor_category($category, $request);

            if($category->save()){
                Session::flash('message', 'Update success category');
                Session::flash('alert-class', 'alert-success');
                return redirect('admins/categories');
            }
        }else{
            Session::flash('message', 'Category doesn\'t exist');
            Session::flash('alert-class', 'alert-warning');

            return redirect('admins/categories');
        }
    }

    private function get_infor_category(Category $category, CategoryFormRequest $request){
        $category->name = $request->name;
        $category->slug = str_slug($request->name);

        return $category;
    }
}
