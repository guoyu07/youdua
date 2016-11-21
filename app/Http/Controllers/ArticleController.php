<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository as Article;

class ArticleController extends Controller
{
    private $article;

    public function __construct(Article $article)
    {
        $this->middleware('guest');
        $this->article = $article;
    }

    /**
     * @param $id Article ID
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show($id)
    {
        $article = $this->article->with(['tags'])->find($id);
        $relatedArticles = $this->article->getRelatedArticles($article);
        return view('article')->with(compact('article','relatedArticles'));
    }
}
