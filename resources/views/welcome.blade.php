@extends('main')

@section('title'){{ \App\Models\Config::title() }}@endsection
@section('description'){{ \App\Models\Config::description() }}@endsection

@section('content')
    {{--<x-category-navigation />--}}
    @include('components.category-navigation')
    <x-menu />
@endsection
