<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'shop_id' => 'string|required',
            'categories' => 'array|required',
            'colors' => 'array|required',
            'code' => 'enum',
            'name' => 'required',
            'status' => 'boolean|required',
            /* 'name' => 'required|unique:products', */
            'description' => 'required|min:10',
            'price' => 'required',
            'stock' => 'required',
            'width' => 'required',
            'height' => 'required',
            'length' => 'required',
            /* 'photos.*' => 'nullable', */
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg',
        ];
    }
}
