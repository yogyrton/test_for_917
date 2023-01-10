<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaFormCreate extends FormRequest
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
            'theme' => 'required|min:1|max:100',
            'comment' => 'required|min:1|max:100',
            'file' => 'required|mimes:png,jpg,jpeg|max:10000',
            'firstname' => 'required|min:1|max:100',
        ];
    }
}
