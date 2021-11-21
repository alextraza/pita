@extends('main')

@section('title')
    Оформить заказ
@endsection

@section('description')
    description
@endsection

@section('breadcrumbs')
    <ul>
        <li><a href="{{ route('index') }}">Главная</a></li>
        <li><a href="{{ route('cart.index') }}">Корзина</a></li>
        <li><span>Оформить заказ</span></li>
    </ul>
@endsection

@section('content')
    {{--<x-internal />--}}
    {{--<x-cart />--}}
    @include('components.internal')
    @include('components.checkout-section')
@endsection
