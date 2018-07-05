<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Comment;
use App\User;
class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index', 'show', 'articles'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$articles = Article::all();
        $articles = Article::orderBy('id', 'desc')->paginate(5);
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required | min: 4',
            'details' => 'required | min: 10'
        ]);
        // Get the currently authenticated user...
        $user = Auth::user();
       Article::create([
           'title' =>$request->title,
           'details' =>$request->details,
           'user_id' => auth()->id()
       ]);
       
       session()->flash('message', 'your Article has been successfully added');
       return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        $userId = Auth::id();
        
        if ($article->user_id !== $userId) {
            session()->flash('error', 'Sorry that it is not your article !! you can not edit it');
            return redirect('/articles');
        }
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->title = $request->title;
        $article->details = $request->details;

        $userId = Auth::id();
        if ($article->user_id !== $userId) {
            session()->flash('error', 'Sorry that it is not your article !! you can not edit it');
            return redirect('/articles');
        }
        $article->save();
        session()->flash('message', 'your article has been successfully updated');
         return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        $userId = Auth::id();

        if ($article->user_id !== $userId) {
            session()->flash('error', 'Sorry that it is not your article !! you can not delete it !!');
            return redirect('/articles');
            
        }

        $article->delete();
        session()->flash('message', 'your article has been deleted');
        return redirect(route('articles.index'));
        
    }
}

