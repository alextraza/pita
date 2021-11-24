@extends('main')

@section('title')
    Личный кабинет
@endsection

@section('description')
    Ваша корзина
@endsection

@section('breadcrumbs')
    <ul>
        <li><a href="{{ route('index') }}">Главная</a></li>
        <li><span>Личный кабинет</span></li>
    </ul>
@endsection

@section('content')
    {{--<x-internal />--}}
    {{--<x-cart />--}}
    @include('components.internal')
    @include('components.user-section')
@endsection
