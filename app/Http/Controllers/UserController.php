<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Article;
use App\Models\User;


class UserController extends Controller
{
    // TODO: overweeg een aparte AutheticationController voor authenticatie / registratie / login / logout acties, en een UserController
    // voor user management
    public function login() {        
        return view('user.login');
    }

    public function logout() {
        Auth::logout();

        return redirect('articles');
    }

    public function authenticate(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        $remember = $request->remember and $request->remember == 1;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('user.overview'));
        }
        
        return back()->withErrors([
            'name' => 'Opgegeven gebruikersnaam en/of wachtwoord is onjuist.',
        ])->onlyInput('name');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        if (null !== Auth::id()) {
            $articles = Article::orderBy('created_at', 'desc')->where('user_id', Auth::id())->get();
            return view('user.overview', compact('articles'));
        }

       return redirect()->route('articles.overview');  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if (Auth::guest()) {
            return redirect('/user/login');
        }

        
        $user = User::where('id', Auth::id())->first();

        $articles = $user->premium ? Article::orderBy('created_at', 'desc')->where('premium', 1 )->get() : [];

        return view('user.premium')->with(compact('articles'))->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
         if (Auth::guest()) {
            return redirect('/user/login');
        }

        $user = User::find(Auth::id());        

        $user->premium = $request->payment;

        $user->save();

        $articles = $user->premium ? Article::orderBy('created_at', 'desc')->where('premium', 1 )->get() : [];

        return view('user.premium')->with(compact('articles'))->with(compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
       
    }
}
