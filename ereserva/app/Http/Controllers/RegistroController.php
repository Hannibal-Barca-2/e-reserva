<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistroController extends Controller
{
    public function create() {
        return view('auth.register'); //la vista de registro
    }

    public function store() {

        $this->validate(request(), [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $admin = User::create(request(['name', 'email', 'password']));
        auth()->login($admin);
        return redirect()->to('home2');
    }
}
