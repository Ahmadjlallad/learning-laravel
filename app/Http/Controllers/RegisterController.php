<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function store(): RedirectResponse
    {
        $attributes = request()?->validate(
            [
                'username' => ['required', 'max:255',
                    'unique:users,username',
                    // or Rule::unique('users', 'username')
                ],
                'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
                'password' => ['required', 'max:255', 'min:8'],
                'name' => ['required', 'max:255'],
            ],
        );
        $user = User::create($attributes);
        Auth::login($user);
        return redirect()->route('home')->with('success', 'Your account has been created');
    }

    public function create(): Application|Factory|View
    {
        return view('register.create');
    }
}
