@extends('layouts.app')

@section('content')
    <div class="author">
        <div class="author-avatar">
            <img class="img-circle" src="{{$author->avatar}}" />
        </div>
        <div class="author-name">{{$author->name}}</div>
    </div>

    <div class="article-related">
        <h3 class="title">文章</h3>
        @foreach($articles as $article)
            <div class="article-list">
                <a href="/article/{{$article->id}}">
                    <h3>{{$article->title}}</h3>
                    <h4 class="clearfix">
                        <small class="pull-left">{{$article->created_at}}</small>
                        <small class="pull-right">{{$article->hits}}阅读</small>
                    </h4>
                </a>
            </div>
        @endforeach
    </div>
@endsection