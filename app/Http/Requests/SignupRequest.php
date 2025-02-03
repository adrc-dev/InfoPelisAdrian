<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class SignupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        $rules['name'] = ['required', 'string', 'min:2', 'max:20'];
        $rules['email'] = ['required', 'string', 'min:5', 'max:255', 'unique:users'];
        $rules['password'] = ['required', 'confirmed', Rules\Password::defaults()];
        $rules['surname'] = ['required', 'string', 'min:2', 'max:40'];
        $rules['nickname'] = ['required', 'string', 'min:2', 'max:20', 'unique:users'];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.min' => 'El nombre debe tener al menos 2 caracteres.',
            'name.max' => 'El nombre no puede tener mas de 20 caracteres.',

            'email.required' => 'El correo electronico es obligatorio.',
            'email.string' => 'El correo electronico debe ser una cadena de texto.',
            'email.min' => 'El correo electronico debe tener al menos 5 caracteres.',
            'email.max' => 'El correo electronico no puede tener mas de 255 caracteres.',
            'email.unique' => 'El correo electronico ya esta en uso.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',

            'surname.required' => 'El apellido es obligatorio.',
            'surname.string' => 'El apellido debe ser una cadena de texto.',
            'surname.min' => 'El apellido debe tener al menos 2 caracteres.',
            'surname.max' => 'El apellido no puede tener mas de 20 caracteres.',

            'nickname.required' => 'El nick es obligatorio.',
            'nickname.string' => 'El nick debe ser una cadena de texto.',
            'nickname.min' => 'El nick debe tener al menos 2 caracteres.',
            'nickname.max' => 'El nick no puede tener mas de 20 caracteres.',
            'nickname.unique' => 'El nick ya esta en uso.',
        ];
    }
}
