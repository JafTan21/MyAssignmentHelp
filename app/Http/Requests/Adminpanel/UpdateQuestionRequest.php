<?php

namespace App\Http\Requests\Adminpanel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
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
            'description' => ['nullable', 'string', 'max:500'],
            'slug' => [
                'required',
                'unique:questions,slug,' . $this->question->id . ',id',
            ],
            'question_category_id' => ['required'],
        ];
    }
}
