<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\Article;
use App\Models\User;


class UserController extends Controller
{
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
