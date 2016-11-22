<?php
namespace App\Repositories;

use App\Article;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class ArticlesRepository extends Repository {

    public function model() {
        return 'App\Article';
    }

    public function getArticlesWithAuthorAndThumbnails() {
        $articles = $this->with(['author'])->all();
        return $this->getThumbnails($articles);
    }

    public function getArticlesWithAuthorAndThumbnailsByCategoryId($id) {
        $articles = $this->with(['author'])
                    ->findWhere([['category_id', '=', $id]]);

        return $this->getThumbnails($articles);
    }

    public function getArticlesWithThumbnailsByAuthorId($id) {
        $articles = $this->findWhere([['author_id', '=', $id]]);

        return $this->getThumbnails($articles);
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

        return $this->getThumbnails($articles);
    }

    public function getThumbnails($articles)
    {
        return $articles->map(function($item){
            $item->thumbnails = $this->getImagesInText($item->content);
            return $item;
        });
    }

    public function getImagesInText($text)
    {
        $p = '/<img.*?src=[\'|\"](.+?)[\'|\"].*?>/i';
        preg_match_all($p,$text,$images);
        return array_slice($images[1], 0, 3);
    }
}