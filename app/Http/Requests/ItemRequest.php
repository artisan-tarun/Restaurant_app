<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
        $rules = [
            'title' => 'required|unique:items',
            'description' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'price' => 'required',
        ];

        switch($this->method()) {
            case 'PUT' :
                $rules['title'] = 'required';
            case 'PATCH' :

            break;
        }
        return $rules;
    }
}
