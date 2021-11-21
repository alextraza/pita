@extends('main')

@section('title')
    Корзина
@endsection

@section('description')
    Ваша корзина
@endsection

@section('breadcrumbs')
    <ul>
        <li><a href="{{ route('index') }}">Главная</a></li>
        <li><span>Корзина</span></li>
    </ul>
@endsection

@section('content')
    {{--<x-internal />--}}
    {{--<x-cart />--}}
    @include('components.internal')
    @include('components.cart')
@endsection
