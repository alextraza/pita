<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'name' => 'required|string',
            'phone' => 'required',
            'client-address' => 'nullable',
            'address' => 'nullable|string',
            'house' => 'nullable|max:10',
            'entrance' => 'numeric|nullable',
            'apartment' => 'numeric|nullable',
            'floor' => 'numeric|nullable',
            'code' => 'nullable|string|max:10',
            'delivery_time' => 'string|nullable',
        ];
    }
}
