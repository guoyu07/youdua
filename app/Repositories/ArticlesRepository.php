<?php
namespace App\Repositories;

use App\Article;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class ArticlesRepository extends Repository {

    public function model() {
        return 'App\Article';
    }

    /**
     * @param $article
     * @param int $limit Limit
     * @return bool
     */
    public function getRelatedArticles($article, $limit = 5)
    {
        //条件: 1.相同分类, 2.id < 最新id, 3.id !=当前Id
        $articles = Article::with(['author'])->where([
            ['id', '<>', $article->id],
            ['category_id', '=', $article->category_id],
        ])->inRandomOrder()->take($limit)->get();

        return $articles;
    }
}