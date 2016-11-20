@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    @foreach($articles as $article)
        <div class="article-list">
            <a href="/article/{{$article->id}}">
                <h3>{{$article->title}}</h3>
                <h4><small>{{$article->author->name}} {{$article->hits}}阅读  {{$article->created_at}}</small></h4>
            </a>
        </div>
    @endforeach
@endsection
