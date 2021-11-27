@extends('main')

@section('title'){{ $page->title }}@endsection
@section('description'){{ $page->description }}@endsection

@section('breadcrumbs')
    <ul>
        <li><a href="{{ route('index') }}">Главная</a></li>
        <li><span>{{ $page->header }}</span></li>
    </ul>
@endsection

@section('content')
    {{-- content here --}}
@endsection
