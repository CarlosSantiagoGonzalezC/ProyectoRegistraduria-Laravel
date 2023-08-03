<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'votante' => 'numeric',
            'candidato' => 'numeric',
            'votoBlanco' => 'numeric',
            'votoCandidato' => 'numeric',
            'votoNulo' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio',
            'max' => 'El campo :attribute es mayor a :max',
            'min' => 'El campo :attribute es menor a :min',
            'numeric' => 'El campo :attribute debe ser de tipo numero'
        ];
    }
}
