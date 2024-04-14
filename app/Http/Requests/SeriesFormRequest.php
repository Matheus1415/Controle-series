<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required','string','max:65',"min:3"],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatorio',
            'nome.min' => "O campo nome precisa pelomenos de :min caracteres",
            'nome.max' => "O campo nome precisa no máximo de :max caracteres",
        ];
    }

}