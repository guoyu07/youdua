<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository as Article;
class IndexController extends Controller
{
    private $article;

    public function __construct(Article $article)
    {
//        $this->middleware('guest');
        $this->article = $article;
    }

    public function index()
    {
        $articles = $this->article->getArticlesWithAuthorAndThumbnails();

        return view('index')->with(compact('articles'));
    }
}
