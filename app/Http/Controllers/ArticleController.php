<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Article;
use App\Models\Category;
use App\Models\File;
use App\Models\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $cat_id = 0;
        
        if(isset($_POST["id"])) {
            $cat_id = htmlspecialchars($_POST["id"]);
        }

        $premium = 0;

        if (null !== Auth::id()) {
            $user = User::where('id', Auth::id())->first();

            $premium = $user->premium;
        }

        $articles = $premium ? Article::orderBy('created_at', 'desc')->get() : Article::orderBy('created_at', 'desc')->where('premium', 0 )->get();

        if ($cat_id > 0) {
            $articles = Article::orderBy('created_at', 'desc')->whereHas('categories', function($query) use($cat_id) {
                $query->where('categories.id', $cat_id);
            })->get();
        }

        $categories = Category::orderBy('id', 'asc')->get();

        return view('articles.overview')->with(compact('articles'))->with(compact('categories'));
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

        $article = new Article();
        $article->user_id = Auth::id();
        $article->name = $request->input('name');
        $article->entry = $request->input('entry');
        $article->save();

        $categories = $request->id;

        $article->categories()->attach($categories);

        if ($request->file('fileToUpload')) {
            $path = $request->fileToUpload->store('images', 'public');

            $file = new File();
            $file->user_id = Auth::id();
            $file->article_id = $article->id;
            $file->name = $path;
            $file->file_path = 'storage\\' . $path;        

            $file->save();
        }

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

 
        $user = User::where('id', Auth::id())->first();

        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('articles.edit')->with(compact('article'))->with(compact('user'))->with(compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if (Auth::guest()) {
            return redirect('/user/login');
        }
        
        $article->name = $request->input('name');
        $article->entry = $request->input('entry');
        $article->premium = $request->input('premium');
        $article->save();

        $categories = $request->id;

        $article->categories()->attach($categories);

        if ($request->file('fileToUpload')) {
            $path = $request->fileToUpload->store('images', 'public');

            $file = new File();
            $file->user_id = Auth::id();
            $file->article_id = $article->id;
            $file->name = $path;
            $file->file_path = 'storage\\' . $path;        

            $file->save();
        }

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
