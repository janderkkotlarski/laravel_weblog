<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Article;
use App\Models\Category;
use App\Models\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $cat_id = 0;

        // Start query building
        $articles = Article::query(); 
        
        // Using GET request to get the category_id
        if(isset($_GET["category_id"])) {
            $cat_id = htmlspecialchars($_GET["category_id"]);
        }

        $premium = 0;

        if (null !== Auth::id()) {
            $user = Auth::user();
            $premium = $user->premium;
        }

        // Add a premium or not query part
        $premium ? $articles->orderBy('created_at', 'desc') : $articles->orderBy('created_at', 'desc')->where('premium', 0 );

        $categories = Category::orderBy('id', 'asc')->get();
            
        if ($cat_id > 0) {
            // Add a category based query part
            $articles->orderBy('created_at', 'desc')->whereHas('categories', function($query) use($cat_id) {
                $query->where('categories.id', $cat_id);
            });
        }

        // Finalize the query by getting it.
        $articles = $articles->get();         

        return view('articles.overview')->with(compact('articles'))->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $user = Auth::user();

        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('articles.create')->with(compact('user'))->with(compact('categories'));
    }

    public function validation(ArticleStoreRequest $request) {
        $validator = Validator::make($request->all(), [
            'fileToUpload' => 'required|file|mimetypes:image/png,image/jpg,image/jpeg',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.overview')
            ->withErrors($validator);
        }
    }

    public function file_uploading(ArticleStoreRequest $request, Article $article) {
        if ($request->file('fileToUpload')) {
            ArticleController::validation($request);

            $path = $request->fileToUpload->store('images', 'public');

            $file = new File();
            $file->user_id = $article->user_id;
            $file->article_id = $article->id;
            $file->name = $path;
            $file->file_path = 'storage\\' . $path; 

            $file->save();
        }
    }

    /**s
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
    {
        // Just directly create a new article from the validated request, ezpz
        $article = Article::create($request->validated());       
        
        $categories = $request->category_id;
        $article->categories()->attach($categories);

        ArticleController::file_uploading($request, $article);

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
        $user = Auth::user();
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('articles.edit', compact('article', 'user', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleStoreRequest $request, Article $article)
    {   
        // Best to turn the validated values into an updated article.
        $updated = new Article($request->validated());

        $article->name = $updated->name;
        $article->entry = $updated->entry;
        $article->premium = $updated->premium;
        
        $article->save();
        
        $categories = $request->category_id;
        // If one wants to change the categories, detachment is necessary
        $article->categories()->detach();
        $article->categories()->attach($categories);

        ArticleController::file_uploading($request, $article);

        return redirect()->route('user.overview');
    }

    public function delete(Article $article)
    {
        return view('articles.delete', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('user.overview');
    }
}
