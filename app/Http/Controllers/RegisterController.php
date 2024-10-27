<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //metodo para mostrar la vista
    public function show (){
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('auth.register');
    }

    public function register (RegisterRequest $request){
        $user =User::create($request->validated());
        return redirect('/login')->with('success','Cuenta creada con exito!');
    }


}
