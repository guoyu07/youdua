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

        <div class="article-related">

        </div>
    </div>
@endsection