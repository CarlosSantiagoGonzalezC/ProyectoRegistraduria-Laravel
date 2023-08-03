<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'useNombre' => 'required|min:1|max:40',
            'useApellido' => 'required|min:1|max:40',
            'useNumDocumento' => 'required|numeric',
            'useCorreo' => 'min:1|max:40|unique:users',
            'usePassword' => 'min:1|max:40',
            'useMesa' => 'required|numeric|min:1|max:15',
            'useRol' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio',
            'max' => 'El campo :attribute es mayor a :max',
            'min' => 'El campo :attribute es menor a :min',
            'numeric' => 'El campo :attribute debe ser de tipo numero',
            'unique' => 'El campo :attribute ya existe'
        ];
    }
}
