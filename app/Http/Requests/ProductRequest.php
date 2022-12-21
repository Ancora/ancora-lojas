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
            'shop_id' => 'int|required',
            'code' => 'enum',
            'name' => 'required',
            /* 'name' => 'required|unique:products', */
            'description' => 'required|min:10',
            'price' => 'required',
            'stock' => 'required',
            'width' => 'required',
            'height' => 'required',
            'length' => 'required',
            /* 'photos.*' => 'image', */
        ];
    }
}
