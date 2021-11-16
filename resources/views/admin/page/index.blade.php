@extends('admin.main')

@section('title')
    Страницы
@endsection

@section('breadcrumb')
    <div class="breadcrumb-top">
        <div class="header">
            Страницы
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">Заказы</a>
                </li>
                <li>
                    <span>Страницы</span>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="dock">
        <div class="dock__header">
            <a class="btn" href="{{ route('page.create') }}">+ Добавить</a>
            <a id="massDel" class="btn btn--transparent del disabled" href="#">- Удалить</a>
        </div>
        @include('admin.page.grid')
    </div>
@endsection
