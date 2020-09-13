<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        if(auth()->attempt($request->validated()))
        {
            if(auth()->user()->role->name == 'admin')
            {
                return redirect('admin/');
            }
            else{
                return redirect('employee/');
            }
        }
        else
        {
            return redirect()->back()->withErrors(['Invalid Credentials']);
        }
    }

    public function logout()
    {

    }
}
