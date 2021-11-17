@extends('admin.main')

@section('title')
    Пользователи
@endsection

@section('breadcrumb')
    <div class="breadcrumb-top">
        <div class="header">
            Пользователи
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">Заказы</a>
                </li>
                <li>
                    <span>Пользователи</span>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="dock">
        <div class="dock__header">
            <a class="btn" href="{{ route('user.create') }}">+ Добавить</a>
            <a id="massDel" class="btn btn--transparent del disabled" href="#">- Удалить</a>
        </div>
        @include('admin.user.grid')
    </div>
@endsection
