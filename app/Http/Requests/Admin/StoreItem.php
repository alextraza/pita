<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreItem extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,jpg,png,svg|max:2048',
            'header' => 'required',
            'pos' => 'integer|nullable',
            'status' => 'boolean',
            'category_id' => 'integer|nullable',
            'price' => 'integer|nullable',
            'price_alt' => 'integer|nullable',
            'weight' => 'integer|nullable',
            'weight_alt' => 'integer|nullable',
            'capacity' => 'integer|nullable',
            'proteins' => 'numeric|nullable',
            'fats' => 'numeric|nullable',
            'carbo' => 'numeric|nullable',
            'has_alt' => 'boolean',
        ];
    }
}
