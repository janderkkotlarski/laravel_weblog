<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('articles.overview'));
        }
        
        return back()->withErrors([
            'name' => 'De opgegeven gebruikersnaam is onjuist.',
        ])->onlyInput('name');
    }

    public function bogus(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('articles.overview'));
        }

        return back()->withErrors([
            'name' => 'Opgegeven gebruikersnaam en/of wachtwoord is onjuist.'
        ]);
    }
}
