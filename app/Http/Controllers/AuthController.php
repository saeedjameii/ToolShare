<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signUp(){
        return view('auth.signUp');
    }

    public function signUpPost(Request $request){
        // dump($request->all());
        $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if(!$user){
            return redirect()->back()->with('error', 'Registration failed, try again');
        }

        return redirect()->route('home')->with('success', 'Registration succeed, Login to the account');
        
    }

    public function Login(){
        return view('auth.Login');
    }

    public function LoginPost(Request $request){
        // $request->validate([
        //     'email' => 'required|email|exists:users',
        //     'password' => 'required|min:8'
        // ]);
        // // the method below is equal to exists:user, but it is more rational because now we have access to $user
        // $user = User::where('email', $request->email)->first();
        // if(!$user){
        //     return redirect()->back()->with('error', 'user with this email was not found');
        // }

        // if(!Hash::check($request->password, $user->password)){
        //     return redirect()->back()->with('error', 'the password entered is wrong');
        // }

        // Auth::login($user);
        
        // return redirect()->route('home');

        $credentials = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'the password is wrong');

    }

    public function Logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
