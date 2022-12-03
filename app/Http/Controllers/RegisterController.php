<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function indexBalance()
    {
        return view('register.register-2', [
            'title' => 'Register 2'
        ]);
    }

    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255|confirmed',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // credentials with no validation
        $credentials = $request->only('username', 'password');

        // auth registered user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/balance')->with('success', 'Registration successful!');
        }

        // $validatedBalance = $request->validate([
        //     'balance' => 'numeric',
        // ]);

        // $user = User::where('username', $validatedData['username'])->first();
        // $user->balance()->create($validatedBalance);

        // // auto login after register
        // Auth::login($user);

    }

    public function balance(Request $request)
    {
        // add balance to user
        User::where('username', Auth::user()->username)->update([
            // if balance null then 0
            'balance' => $request->balance ?? 0
        ]);

        return redirect('/dashboard')->with('success', 'Balance added successfully');
    }
}
