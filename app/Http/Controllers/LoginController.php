<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            $user = Auth::user();
            $rol = $user->rol; // Asumiendo que tienes una relación 'rol' en tu modelo User

            switch($rol->id){
                case 1:
                    return redirect('/admin/dashboard');
                case 2:
                    return redirect('/gerente/inicioGerente');
                case 3:
                    return redirect('/farmaceutico/inicioFarmaceutico');
                case 4:
                    return redirect('/analista/inicioAnalista');
                default:
                    return redirect('/home'); // Redirige a /home si no se encuentra un rol específico
            }
        }

        return back()->with('error', 'Credenciales incorrectas.');
    }
}
