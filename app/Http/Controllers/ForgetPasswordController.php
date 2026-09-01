<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function forgetPassword()
    {

        return view('auth.forget');

    }

    public function forgetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $email = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if($email){
            return redirect()->back()->with('error', 'Password forgotten email has already been sent');
        }

        $token = str()->random(10);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->back()->with('success', 'We have send an email to reset your password');

    }


    public function resetPassword($token){
        return view('auth.reset', compact('token'));
    }

    public function resetPasswordPost(Request $request){

        $request->validate([
            'token' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $updatePassword = DB::table('password_reset_tokens')->where([
            'token' => $request->token
        ])->first();

        if(!$updatePassword){
            return redirect()->back()->with('error', 'Invalid Data');
        }

        User::where('email', $updatePassword->email)->update([
            'password' =>  Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where('token', $request->token)->delete();

        return redirect()->route('login');
    }
} 