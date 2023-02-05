<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponses;

    public function index()
    {
        return view('backend.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (\Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('login.index')->with('error', 'Email or password is incorrect');
        }
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('login.index');
    }
}
