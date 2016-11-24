@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    <div class="main-layout col-md-8 col-md-offset-2">
        <div class="author">
            <div class="author-avatar">
                <img class="img-circle" src="{{$author->avatar}}" />
            </div>
            <div class="author-name">{{$author->name}}</div>
        </div>

        <div class="article-related">
            <h3 class="title">文章</h3>
            @foreach($articles as $article)
                <div class="article-list @if (count($article->thumbnails) != 1) article-thumbnails @endif">
                    <a href="/article/{{$article->id}}">
                        <h3 class="article-title">{{$article->title}}</h3>
                        @if(!empty($article->thumbnails))
                            <div class="article-thumbnail">
                                @foreach($article->thumbnails as $thumbnail)
                                    <div class="thumbnail-holder">
                                        <div class="thumbnail-holder-inner">
                                            <img class="lazy" data-original="{{$thumbnail}}" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <h4 class="article-info">
                            <small class="pull-left">{{$article->created_at}}</small>
                            <small class="pull-right">{{$article->hits}}阅读</small>
                        </h4>
                    </a>
                </div>
            @endforeach
            {{$articles->links()}}
        </div>
    </div>
@endsection