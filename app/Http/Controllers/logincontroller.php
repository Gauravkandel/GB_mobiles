<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class logincontroller extends Controller
{
    public function login()
    {
        return view("login.login");
    }
    public function register()
    {
        return view("login.register");
    }
    public function logindata(Request $req)
    {
        $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (auth()->attempt(
            $req->only('email', 'password'),
            $req->filled('remember')
        )) {
            return redirect("/dash");
        }
        return redirect()->back()->with("message", "Invalid Credentials");
    }
    public function logout()
    {
        Auth()->logout();
        return redirect("/login");
    }
    public function registerdata(Request $req)
    {
        $present = User::where('email', $req->email)->first();
        if ($present) {
            return redirect('/register')->with('message', "Email already present in database");
        }
        $req->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $users = new user();
        $users->name = $req->name;
        $users->email = $req->email;
        $users->password = Hash::make($req->password);
        $users->save();
        return redirect('/login')->with('message', "Successfully registered");
    }
    public function logwithgoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackfromgoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            $is_user = User::where('email', $user->getEmail())->first();
            if (!$is_user) {
                $save_user = User::updateOrCreate(
                    [
                        'google_id' => $user->getId()
                    ],
                    [
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'password' => Hash::make('@' . $user->getName() . '*' . $user->getId())
                    ]
                );
            } else {
                $save_user = User::where('email', $user->getEmail())->update([
                    'google_id' => $user->getId
                ]);
                $save_user = User::where('email', $user->getEmail())->first();
            }
            Auth::loginUsingId($save_user->id);

            return redirect("/dash");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
