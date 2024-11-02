<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|max:10|min:8|unique:clientes',
            'telefono' => 'nullable|string|max:10',
            'direccion' => 'nullable|string|max:255',
            'role' => 'nullable|in:user,admin', // Agregado para validar el rol
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'username.required' => 'El campo nombre de usuario es obligatorio.',
            'username.unique' => 'El nombre de usuario ya está en uso.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password_confirmation.required' => 'El campo de confirmación de contraseña es obligatorio.',
            'password_confirmation.same' => 'Las contraseñas no coinciden.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'cedula.required' => 'El campo cédula es obligatorio.',
            'cedula.unique' => 'La cédula ya está registrada.',
            'cedula.min' => 'La cedula tiene que tener minimo 8 digitos',
            'cedula.max' => 'La cedula tiene que tener maximo 10 digitos',
            'role.in' => 'El rol debe ser "user" o "admin".',
        ];
    }
}
