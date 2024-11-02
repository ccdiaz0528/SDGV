<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // Validar la información de registro
        $validatedData = $request->validated();

        // Crear el usuario con rol 'user'
        $user = User::create([  // Asignar el usuario a la variable $user
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'], // No encriptes aquí, el modelo se encargará de eso
            'role' => 'user',
        ]);

        // Crear el cliente vinculado al usuario
        Cliente::create([
            'user_id' => $user->id,  // Ahora puedes acceder a $user
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cedula' => $request->cedula,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        // Autenticar al usuario automáticamente
        auth()->login($user);

        return redirect()->route('home.index')->with('success', '¡Registro exitoso!');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}
