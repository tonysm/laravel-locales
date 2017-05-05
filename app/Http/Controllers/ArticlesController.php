<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param \App\Article $article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
            'comments' => $article->comments()->with('user')->latest()->paginate(),
        ]);
    }
}
