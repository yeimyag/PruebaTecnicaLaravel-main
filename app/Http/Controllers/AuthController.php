<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request, Redirector $redirect){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return $redirect->to('/');
        }

        throw ValidationException::withMessages([
            'message'=> __('auth.failed')
        ]);
        
    }

    public function register(Request $request, Redirector $redirect){
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'name' => ['required', 'string'],
            'password' => ['required', 'string','min:8']
        ]);

        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();            
        return $redirect->to('/');
        

    }

    public function logout(Request $request, Redirector $redirect){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $redirect->to('/');
    }
}
