@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    <script>
        var currentCategoryId = {{$article->category_id}};
    </script>
    <div class="article">
        <div class="article-header">
            <h2>{{$article->title}}</h2>
            <h4><small><a href="/author/{{$article->author_id}}">{{$article->author->name}}</a>  {{$article->created_at}}</small></h4>
        </div>

        <div class="article-content">
            {!! $article->content !!}
        </div>

        <div class="article-footer">
            <p class="article-tags">
                @foreach($article->tags as $tag)
                    <span class="label label-default">{{$tag->name}}</span>
                @endforeach
            </p>
            <p class="article-hits pull-left">
                <span>阅读{{$article->hits}}</span>
                <span class="glyphicon glyphicon-thumbs-up"></span>{{$article->likes}}
            </p>
            <p class="article-hits pull-right">举报</p>
        </div>

        <div class="article-related">
            <h3 class="title">相关文章</h3>
            @include('article/list')
        </div>
    </div>
@endsection