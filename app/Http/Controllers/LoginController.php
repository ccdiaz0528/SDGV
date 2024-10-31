<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $credentials = $request->getCredentials();

        // Aquí validamos las credenciales
        if (Auth::attempt($credentials)) {
            return $this->authenticated($request, Auth::user());
        }

        return redirect()->to('/login')->withErrors('Usuario/Correo o contraseña incorrecto');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect('home');
    }
}
