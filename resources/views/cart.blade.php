@extends('main')

@section('title')
    Корзина
@endsection

@section('description')
    Ваша корзина
@endsection

@section('content')
    {{--<x-internal />--}}
    {{--<x-cart />--}}
    @include('components.internal')
    @include('components.cart')
@endsection
