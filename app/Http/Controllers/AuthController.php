<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Requests\Auth\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(RegisterFormRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        auth('web')->login($user);

        return redirect()->route('cabinet.index-form');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginFormRequest $request)
    {
        $data = $request->validated();

        if (!auth('web')->attempt($data)) {
            return redirect()->back()->withErrors(['password' => 'Неверный пароль.'])->withInput();
        }

        return redirect()->route('cabinet.index-form');
    }

    public function logout(Request $request)
    {

        auth('web')->logout();

        return redirect()->route('auth.login-form');
    }

    public function checkPasswordForm(Request $request)
    {
        return view('auth.check-pass');
    }

    public function updatePasswordForm()
    {
        if (!isset($_COOKIE['password_verify'])) {
            abort(403);
        }

        return view('auth.new-pass');
    }

    public function checkPassword(Request $request)
    {
        $user = auth('web')->user();
        $data = $request->validate([
            'password' => ['required', 'string']
        ]);

        if (!password_verify($data['password'], $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Неверный пароль.']);
        }

        setcookie('password_verify', 'success', time() + 180);

        return redirect()->route('auth.update-password');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'confirmed', 'min:8']
        ]);

        /**
         * @var \App\Models\User $user
         */
        $user = auth('web')->user();

        if (password_verify($data['password'], $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Новый пароль должен отличатся от старого.']);
        }

        $user->update([
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('cabinet.index-form');
    }
}
