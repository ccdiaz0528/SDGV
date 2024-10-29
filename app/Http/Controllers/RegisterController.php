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

    // Crear el usuario
    $user = User::create([
        'username' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

    // Crear el cliente vinculado al usuario
    Cliente::create([
        'user_id' => $user->id,
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'cedula' => $request->cedula,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion,
    ]);

    // Autenticar al usuario automáticamente
    auth()->login($user);

    return redirect()->route('home')->with('success', '¡Registro exitoso!');
    }



    public function showRegistrationForm()
    {
    return view('auth.register');
    }
}
