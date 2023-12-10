<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $this->validate($request, [
            'name' => ['required', 'string', 'regex:/^[а-яА-Я\s]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'login' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])/',],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg'],
        ]);

        Log::info($validatedData['login']);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'login' => $validatedData['login'],
            'password' => Hash::make($validatedData['password']),
            'avatar' => $validatedData['avatar']->store('images', 'public'),
        ]);

        return redirect('/home');
    }
}
