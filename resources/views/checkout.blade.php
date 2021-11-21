@extends('main')

@section('title')
    Оформить заказ
@endsection

@section('description')
description
@endsection

@section('content')
    {{--<x-internal />--}}
    {{--<x-cart />--}}
    @include('components.internal')
    @include('components.checkout-section')
@endsection
