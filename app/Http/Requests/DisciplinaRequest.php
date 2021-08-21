<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisciplinaRequest extends FormRequest
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
             //validate
            'nome'=>"required|min:5|max:100|unique:disciplinas,nome,$this->disciplina",
            'professor'=>'required|min:3|max:100|string|filled',
            'cargahr'=>'required|filled|numeric',
        ];
    }
}
