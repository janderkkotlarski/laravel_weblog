<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('articles.overview', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        if (Auth::guest()) {
            return redirect('/user/login');
        }

        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('articles.create', compact('categories'));
    }

    /**s
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        if (Auth::guest()) {
            return redirect('/user/login');
        }

        $categories = $request->id;

        $article = new Article();
        $article->user_id = Auth::id();
        $article->name = $request->input('name');
        $article->entry = $request->input('entry');
        $article->save();

        $article->categories()->attach($categories);

        return redirect()->route('user.overview');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if (Auth::guest()) {
            return redirect('/user/login');
        }

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if (Auth::guest()) {
            return redirect('/user/login');
        }

        $categories = $request->id;

        $article->name = $request->input('name');
        $article->entry = $request->input('entry');
        $article->save();

        $article->categories()->attach($categories);       

        return redirect()->route('user.overview');
    }

    public function delete(Article $article)
    {
        if (Auth::guest()) {
            return redirect('/user/login');
        }

        return view('articles.delete', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (Auth::guest()) {
            return redirect('/user/login');
        }

        $article->delete();

        return redirect()->route('user.overview');
    }
}
