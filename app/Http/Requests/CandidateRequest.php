<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
            'canNombre' => 'required|min:1|max:40',
            'canApellido' => 'required|min:1|max:40',
            'canPartidoPolitico' => 'required|min:1|max:40',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio',
            'max' => 'El campo :attribute es mayor a :max',
            'min' => 'El campo :attribute es menor a :min',
        ];
    }
}
