<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository as Article;
use App\Repositories\CategoriesRepository as Category;

class CategoryController extends Controller
{
    private $article;
    private $category;

    public function __construct(Article $article, Category $category)
    {
        $this->middleware('guest');
        $this->article = $article;
        $this->category = $category;
    }

    public function articles($id)
    {
        //获取当前分类
        $category = $this->category->find($id);

        //获取某分类下的文章列表
        $articles = $this->article->getArticlesWithAuthorAndThumbnailsByCategoryId($id);

        return view('index')->with(compact('category', 'articles'));
    }
}
