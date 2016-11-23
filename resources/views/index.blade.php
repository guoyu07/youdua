@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
    @include('layouts.navXs')
@endsection

@section('content')
    <script>
    @if (isset($category))
        var currentCategoryId = {{$category->id}};
    @else
        var currentCategoryId = 0;
    @endif
    </script>
    <div class="index-top"></div>
    @include('article/list')
    {{$articles->links()}}
@endsection
