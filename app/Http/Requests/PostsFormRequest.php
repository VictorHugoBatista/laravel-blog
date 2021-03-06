<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsFormRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
        ];
    }

    /**
     * Menssagens customizadas de validação, exibidas
     * no front dos forms.
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Por favor, digite o título do post',
            'content.required' => 'Pos favor, digite o corpo do post',
        ];
    }
}
