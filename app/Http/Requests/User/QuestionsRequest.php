<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequest extends FormRequest
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
          'title'           => 'required|max:30',
          'tag_category_id' => 'required',
          'content'         => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
          'title.required'           => '入力必須の項目です。',
          'title.max'                => '30文字以内で入力してください。',
          'tag_category_id.required' => '入力必須の項目です。',
          'content.required'         => '入力必須の項目です。',
          'content.max'              => '255文字以内で入力してください。',

        ];
    }
}

