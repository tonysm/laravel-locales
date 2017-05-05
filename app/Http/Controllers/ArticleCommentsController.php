<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleCommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param \App\Article $article
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Article $article, Request $request)
    {
        $article->comments()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id,
        ]);

        return back();
    }
}
