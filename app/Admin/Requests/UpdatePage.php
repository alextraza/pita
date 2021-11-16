<?php

namespace App\Admin\Requests;

use Illuminate\Validation\Rule;

class UpdatePage extends StorePage
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
        return array_merge(parent::rules(), [
            'slug' => [
                'required',
                Rule::unique('pages')
                ->ignore($this->id)
            ]
        ]);
    }
}
