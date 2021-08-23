<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
           'nome'=>"required|min:12|max:100|unique:disciplinas,nome,$this->disciplina",
           'idade'=>'required|min:2|numeric|filled',
           'email'=>'required|min:12|max:100',
           'telefone'=>'required|filled|numeric',
           'obs'=>'required|max:150',
        ];
    }
    public function attributes()
    {
        return[ 'obs'=>'observação'];
    }


}
