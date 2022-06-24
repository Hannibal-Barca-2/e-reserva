<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SesionController extends Controller
{
    public function create() {
        return view('auth.login'); //la vista de registro
    }

    public function store(){

        if(auth()->attempt(request(['email', 'password']))==false) {
            return back()->withErrors([
                'message' => 'El email o la contraseña son incorrectos, intente de nuevo por favor'
            ]);
        }
        return redirect()->to('/home2');
    }

    public function destroy() {
        auth()->logout();
        return redirect()->to('/login');
    }
}
