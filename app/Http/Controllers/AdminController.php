<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     // Mostrar todos los usuarios
     public function index()
     {
         $users = User::all(); // Obtener todos los usuarios
         return view('admin.index', compact('users')); // Pasar usuarios a la vista
     }

     // Eliminar un usuario
     public function destroy(User $user)
     {
         $user->delete(); // Eliminar el usuario
         return redirect()->route('admin.users')->with('success', 'Usuario eliminado exitosamente.'); // Redirigir después de eliminar
     }
}
