<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaUpdateRequest extends FormRequest
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
            'category_id' => 'required',
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:5|max:100',
            'thumbnail' => 'nullable|mimes:png,jpg,jpeg|max:10000',
            'author' => 'required|min:5|max:100',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'category_id.required' => 'Поле "Категория" должно быть заполнено',

            'title.required' => 'Поле "Тема" должно быть заполнено',
            'title.min' => 'Поле "Тема" должно быть более 5 символов',
            'title.max' => 'Поле "Тема" должно быть не более 100 символов',

            'description.required' => 'Поле "Описание" должно быть заполнено',
            'description.min' => 'Поле "Описание" должно быть более 5 символов',
            'description.max' => 'Поле "Описание" должно быть не более 100 символов',

            'thumbnail.mimes' => 'Поле "Фото" должно иметь форматы jpg, jpeg, png',
            'thumbnail.max' => 'Поле "Фото" должно быть не больше 8 мб',

            'author.required' => 'Поле "Имя создателя" должно быть заполнено',
            'author.min' => 'Поле "Имя создателя" должно быть более 5 символов',
            'author.max' => 'Поле "Имя создателя" должно быть не более 100 символов',

            'status.required' => 'Поле "Имя создателя" должно быть заполнено',
        ];
    }
}
