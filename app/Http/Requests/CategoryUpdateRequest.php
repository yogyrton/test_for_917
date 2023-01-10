<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:5|max:100',
            'thumbnail' => 'nullable|mimes:png,jpg,jpeg|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Название" должно быть заполнено',
            'title.min' => 'Поле "ФИО" должно быть более 5 символов',
            'title.max' => 'Поле "ФИО" должно быть не более 100 символов',

            'description.required' => 'Поле "Название" должно быть заполнено',
            'description.min' => 'Поле "Название" должно быть более 5 символов',
            'description.max' => 'Поле "Название" должно быть не более 100 символов',

            'thumbnail.mimes' => 'Поле "Фото" должно иметь форматы jpg, jpeg, png',
            'thumbnail.max' => 'Поле "Фото" должно быть не больше 8 мб',
        ];
    }
}
