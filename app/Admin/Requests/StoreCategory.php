<?php

namespace App\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'icon' => 'nullable:max:3',
            'slug' => 'required|unique:categories',
            'header' => 'required',
            'pos' => 'integer|nullable',
            'status' => 'boolean',
        ];
    }
}
