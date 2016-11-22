@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    @include('article/list')
    {{$articles->links()}}
@endsection
