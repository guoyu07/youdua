<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository as Article;
use App\Repositories\AuthorsRepository as Author;
class AuthorController extends Controller
{
    private $article;
    private $author;

    public function __construct(Article $article, Author $author)
    {
        $this->middleware('guest');
        $this->article = $article;
        $this->author = $author;
    }

    public function show($id)
    {
        $author = $this->author->find($id);

        //获取某作者的文章列表
        $articles = $this->article->getArticlesWithThumbnailsByAuthorId($author->id);

        return view('author')->with(compact('author', 'articles'));
    }
}
