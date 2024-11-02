<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'username.required' => 'El campo Correo o Usuario es obligatorio',
            'password.required' => 'El campo Contraseña es obligatorio',
            'password.min' => 'El campo Contraseña es de minimo 8 caracteres',

        ];
    }

    public function getCredentials (){
        $username = $this->get('username');

    // Verificamos si el campo username es un email
    if ($this->isEmail($username)) {
        return [
            'email' => $username,
            'password' => $this->get('password')
        ];
    }
    // Si no es un email, asumimos que es un nombre de usuario
    return [
        'username' => $username,
        'password' => $this->get('password')
    ];
    }

    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(['username' => $value],['username' => 'email'])->fails();
    }
}
