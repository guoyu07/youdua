<?php
namespace App\Repositories;

use App\Article;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class ArticlesRepository extends Repository {

    private $perPage = 10;

    public function model() {
        return 'App\Article';
    }

    /**
     * 获取预加载作者,同时生成缩略图的文章列表
     * @return mixed
     */
    public function getArticlesWithAuthorAndThumbnails() {
        $articles = $this->with(['author'])->paginate($this->perPage);
        return $articles;
    }

    /**
     * 获取预加载作者,同时生成缩略图的指定分类下的文章
     * @param $id
     * @return mixed
     */
    public function getArticlesWithAuthorAndThumbnailsByCategoryId($id) {
        $articles = $this->model->with(['author'])
                    ->where([['category_id', '=', $id]])
                    ->paginate($this->perPage);

        return $articles;
    }

    /**
     * 获取生成缩略图的指定作者的文章
     * @param $id
     * @return mixed
     */
    public function getArticlesWithThumbnailsByAuthorId($id) {
        $articles = $this->model->where([['author_id', '=', $id]])
                        ->paginate($this->perPage);

        return $articles;
    }

    /**
     * 获取相关文章
     * @param $article
     * @param int $limit Limit
     * @return mixed
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

    public function getArticleWithTags($id)
    {
        return $this->with(['tags'])->find($id);
    }

    public function incrementHits($article)
    {
        $article->increment('hits');
    }
}