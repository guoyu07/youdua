@extends('layouts.app')

@section('content')
    <div class="article">
        <div class="article-header">
            <h2>{{$article->title}}</h2>
            <h4><small><a href="/author/{{$article->author_id}}">{{$article->author->name}}</a>  {{$article->created_at}}</small></h4>
        </div>

        <div class="article-content">
            {{$article->content}}
        </div>

        <div class="article-footer">
            <p class="article-tags pull-left">
                @foreach($article->tags as $tag)
                    <span class="label label-default">{{$tag->name}}</span>
                @endforeach
            </p>
            <p class="article-hits pull-right">{{$article->hits}}阅读</p>
        </div>

        <div class="article-related">
            <h3 class="title">相关文章</h3>
            @foreach($relatedArticles as $article)
                @include('article/list')
            @endforeach
        </div>
    </div>
@endsection