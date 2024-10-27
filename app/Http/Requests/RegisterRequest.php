<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ];

    }

    public function messages(): array{
        return [
            'email.required' => 'El campo correo electronico es obligatorio.',
            'email.unique' => 'El correo electronico ya está registrado.',
            'username.required' => 'El campo nombre de usuario es obligatorio.',
            'username.unique' => 'El nombre de usuario ya está en uso.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'El campo contraseña es de minimo 8  caracteres.',
            'password_confirmation.required' => 'El campo de confirmación de contraseña es obligatorio.',
            'password_confirmation.same' => 'Las contraseñas no coinciden.',
        ];

    }
}
