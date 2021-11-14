@extends('admin.main')

@section('title')
    Категории
@endsection

@section('breadcrumb')
    <div class="breadcrumb-top">
        <div class="header">
            Категории
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">Заказы</a>
                </li>
                <li>
                    <span>Категории</span>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="dock">
        <div class="dock__header">
            <a class="btn" href="{{ route('category.create') }}">+ Добавить</a>
            <a id="massDel" class="btn btn--transparent del disabled" href="#">- Удалить</a>
        </div>
        @include('admin.category.grid')
    </div>
@endsection
