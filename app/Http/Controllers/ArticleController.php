<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository as Article;

class ArticleController extends Controller
{
    private $article;

    public function __construct(Article $article)
    {
//        $this->middleware('guest');
        $this->article = $article;
    }

    /**
     * @param $id Article ID
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show($id)
    {
        $article = $this->article->getArticleWithTags($id);

        //阅读量+1
        $this->article->incrementHits($article);

        //相关文章
        $articles = $this->article->getRelatedArticles($article);

        return view('article')->with(compact('article','articles'));
    }
}
