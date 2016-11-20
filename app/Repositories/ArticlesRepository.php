<?php
namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class ArticlesRepository extends Repository {

    public function model() {
        return 'App\Article';
    }
}