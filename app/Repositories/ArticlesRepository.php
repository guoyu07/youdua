<?php
namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class ArticlesRepository extends Repository {

    public function model() {
        return 'App\Article';
    }

    /**
     * @param $article Article
     * @return bool
     */
    public function getRelatedArticles($article)
    {
        //条件: 1.相同分类, 2.id < 最新id, 3.id !=当前Id
        return true;
    }
}