<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Article;
use App\Models\Category;

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

        $articles = Article::orderBy('created_at', 'desc')->get();

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

        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('articles.edit')->with(compact('article'))->with(compact('categories'));
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

        $resource = $request->fileToUpload;

        /*
        $path = $request->file($resource)->storeAs(
            'images', $request->user()->id
        );
        */

        $fileName = time() .'.'. $request->fileToUpload->extension();

        Storage::putFileAs(
            'images', $request->fileToUpload, $fileName
        );

        // Storage::putFile('images', $request->fileToUpload);

        // Storage::disk('public')->put('example.txt', 'Hello world...');
        // Storage::disk('local')->put('example.jpg', $resource);

        // Storage::put('file.txt', 'Moar');
        // Storage::put('test.jpg', $request->fileToUpload);
        //  Storage::disk('public')->put('', $resource);
        
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
