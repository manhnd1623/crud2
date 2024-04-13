<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Hiển thị form đăng nhập
     */
    public function showFormLogin()
    {
        return view('auth2.login');
    }

    /**
     * Xử lý đăng nhập
     */
    public function login()
    {
        \request()->validate([
            "email" => 'required|max:255',
            "password" => 'required|min:8|max:255',
        ]);

        // Cách 1: thủ công không dùng Attempt
        /** @var User $user */
        /*$user = User::query()->where('email', \request('email'))->firstOrFail();

        if (Hash::check(\request('password'), $user->password)) {
            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }

        return redirect()->route('auth.showFormLogin');*/

        $credentials = \request()->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            \request()->session()->regenerate();

            return redirect(RouteServiceProvider::HOME);
        }

        return redirect()->route('auth.showFormLogin');
    }

    /**
     * Hiển thị form đăng ký
     */
    public function showFormRegister()
    {
        return view('auth2.register');
    }

    /**
     * Xử lý đăng ký
     */
    public function register()
    {
        \request()->validate([
            "name" => 'required|max:255',
            "email" => 'required|max:255|unique:users',
            "password" => 'required|min:8|max:255|confirmed',
        ]);

        /** @var User $user */
        $user = User::query()->create([
            'name' => \request('name'),
            'email' => \request('email'),
            'password' => bcrypt(\request('password')),
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Xử lý đăng xuất
     */
    public function logout()
    {
        Auth::logout();

        \request()->session()->invalidate();

        return redirect('/');
    }
}
