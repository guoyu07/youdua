<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository as Article;

class CategoryController extends Controller
{
    private $article;

    public function __construct(Article $article)
    {
        $this->middleware('guest');
        $this->article = $article;
    }

    public function articles($id)
    {
        //获取某分类下的文章列表
        $articles = $this->article->getArticlesWithAuthorAndThumbnailsByCategoryId($id);

        return view('index')->with(compact('articles'));
    }
}
