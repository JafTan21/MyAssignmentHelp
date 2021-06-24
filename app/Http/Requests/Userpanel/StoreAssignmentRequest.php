<?php

namespace App\Http\Requests\Userpanel;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentRequest extends FormRequest
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
            'email' => ['email', 'required'],
            'subject_code' => ['required'],
            'description' => ['nullable'],
            'deadline' => ['required'],
            'number_of_pages' => ['required', 'numeric', 'min:1']
        ];
    }
}
