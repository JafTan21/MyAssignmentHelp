<?php

namespace App\Http\Requests\Adminpanel;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'title' => ['required'],
            'description' => ['required'],
            'slug' => ['required', 'unique:pages,slug'],
            'content' => ['required'],
            'main_category_id' => ['required'],
            'sub_category_id' => ['required'],
        ];
    }
}
