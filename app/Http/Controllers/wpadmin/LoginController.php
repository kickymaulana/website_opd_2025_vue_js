<?php

namespace App\Http\Controllers\wpadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function login()
    {
        return Inertia::render('wpadmin/Login');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            return to_route('users.index');
        }

        session()->flash('error', 'Username atau password salah');
        $this->addError('password', 'Username atau password salah');
    }
}
