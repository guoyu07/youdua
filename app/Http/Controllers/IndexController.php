<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoriesRepository as Category;
use App\Repositories\ArticlesRepository as Article;
class IndexController extends Controller
{
    private $category;
    private $article;

    public function __construct(Category $category, Article $article)
    {
        $this->middleware('guest');
        $this->category = $category;
        $this->article = $article;
    }

    public function index()
    {
        $categories = $this->category->all();
        $articles = $this->article->all();

        return view('index')->with(compact('categories', 'articles'));
    }
}
