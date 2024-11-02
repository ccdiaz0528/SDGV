<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request){
         // Obtén las credenciales del LoginRequest
    $credentials = $request->getCredentials();

    // Validar las credenciales
    if (Auth::attempt($credentials)) {
        return $this->authenticated($request, Auth::user());
    }

    // Log de errores para depuración
    Log::warning('Falló el inicio de sesión con:', $credentials);

    return redirect()->to('/login')->withErrors('Usuario/Correo o contraseña incorrecto');
    }

    protected function authenticated(Request $request, $user)
    {
        Log::info('Usuario autenticado:', ['email' => $user->email]);

        // Redirige según el rol
        if ($user->role === 'admin') {
            return redirect()->route('admin.users'); // Asegúrate de que esta ruta esté definida
        }

        return redirect()->route('home.index'); // Ruta para usuarios normales
    }
}
