<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'content', 'author_id', 'category_id'
    ];

    protected $appends = ['thumbnails'];

    /**
     * 文章的作者
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    /**
     * 文章的分类
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * 文章标签
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * 人性化显示时间
     * @param $date
     * @return string|static
     */
    public function getCreatedAtAttribute($date)
    {
        if (Carbon::now() > Carbon::parse($date)->addDays(10)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }

    public function getThumbnailsAttribute()
    {
        return $this->getImagesInText($this->attributes['content']);
    }

    public function getContentAttribute($content)
    {
        return $content;
//        $this->attributes['thumbnails'] = $this->getImagesInText($content);
//        $patterns = [
//            '/(<img\s*)src/i'
//        ];
//
//        $replacements = [
//            '$1class="lazy" data-original'
//        ];
//
//        return preg_replace($patterns, $replacements, $content);
    }

    public function getImagesInText($text)
    {
        $p = '/<img.*?src=[\'|\"](.+?)[\'|\"].*?>/i';
        preg_match_all($p,$text,$images);
        return array_slice($images[1], 0, 3);
    }
}
