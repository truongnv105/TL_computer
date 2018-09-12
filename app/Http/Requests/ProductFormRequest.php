<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'slug' => 'required|min:5',
            'category_id' => 'required',
            'price' => 'required|gt:10000|numeric',
            'image' => 'required|mimes:jpeg,png,gif,bmp,svg',
            'description' => 'required|min:50',
            'status' => 'required|boolean',
            'item' => 'required|min:5',
            'promotion' => 'nullable',
            'color' => 'required|min:3',
            'warranty' => 'nullable'
        ];
    }
}
