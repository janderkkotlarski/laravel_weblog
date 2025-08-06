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

        $articles = Article::query();
        
        // TODO: gebruik GET request voor index method (conventie)
        if(isset($_GET["id"])) {
            $cat_id = htmlspecialchars($_GET["id"]);
        }

        $premium = 0;

        if (null !== Auth::id()) {
            $user = Auth::user();

            // TODO: je kunt hier auth::user() gebruiken
            // $user = User::where('id', Auth::id())->first();


            $premium = $user->premium;
        }

        $premium ? $articles->orderBy('created_at', 'desc') : $articles->orderBy('created_at', 'desc')->where('premium', 0 );

        $categories = Category::orderBy('id', 'asc')->get();

            
        if ($cat_id > 0) {

            // TODO: overschrijt vorige query?

            $articles->orderBy('created_at', 'desc')->whereHas('categories', function($query) use($cat_id) {
                $query->where('categories.id', $cat_id);
            });
        }


        $articles = $articles->get();
            

        

        return view('articles.overview')->with(compact('articles'))->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        // TODO: kan via middelware op route
        if (Auth::guest()) {
            return redirect('/user/login');
        }

        $user = User::where('id', Auth::id())->first();

        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('articles.create')->with(compact('user'))->with(compact('categories'));
    }

    /**s
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        // TODO: voeg form request validation class toe (zie laravel documentatie)
        if (Auth::guest()) {
            return redirect('/user/login');
        }        

        $article = new Article();
        $article->user_id = Auth::id();
        $article->name = $request->input('name');
        $article->entry = $request->input('entry');
        $article->premium = $request->input('premium');
        $article->save();
        
        $categories = $request->category_id;

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

        return view('articles.edit', compact('article', 'user', 'categories'));
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
