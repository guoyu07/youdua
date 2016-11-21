<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoriesRepository as Category;
use App\Repositories\ArticlesRepository as Article;

class CategoryController extends Controller
{
    private $category;
    private $article;

    public function __construct(Category $category, Article $article)
    {
        $this->middleware('guest');
        $this->category = $category;
        $this->article = $article;
    }

    public function articles($id)
    {
        $categories = $this->category->all();

        //获取某分类下的文章列表
        $articles = $this->article
                        ->with(['author'])
                        ->findWhere([['category_id', '=', $id]]);

        return view('index')->with(compact('categories', 'articles'));
    }
}
