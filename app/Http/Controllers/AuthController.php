<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Usuario;

class AuthController extends Controller
{

    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        $usuario = Usuario::where('login', $credentials['login'])
            ->where('senha', md5($credentials['password']))
            ->first();

        if ($usuario) {
            Auth::login($usuario);

            session(['usuarioLogado' => $usuario]);

            return redirect('/app');
        } else {
            return back()->withErrors([
                'login' => 'Senha ou Login inválidos.',
            ]);
        }
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
