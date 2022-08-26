<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('session.create');
    }

    public function destroy(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Good Bye!😴');
    }

    /**
     * @throws ValidationException
     */
    public function login(): RedirectResponse
    {
        $attributes = $this->validate(request(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required']
        ]);
        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages(['email' => "Please check your password and account name and try again."]);
        }
        session()->regenerate();
        return redirect()->route('home')->with('success', 'Welcome Back🙂');
        // manual way
        /* return back()
            ->withInput()
            ->onlyInput('email');
            ->withErrors(['email' => "Please check your password and account name and try again."]);
        */
    }
}
