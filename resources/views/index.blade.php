@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    @foreach($articles as $article)
        @include('article/list')
    @endforeach
@endsection
