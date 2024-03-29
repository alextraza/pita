@extends('main')

@section('title'){{ $page->title ?? \App\Models\Config::title() }}@endsection
@section('description'){{ $page->description ?? \App\Models\Config::description() }}@endsection

@section('content')
    {{--<x-category-navigation />--}}
    {{--<x-menu />--}}
    @include('components.banner')
    @include('components.category-navigation')
    @include('components.menu')
    @include('components.content-section')
  
@endsection

