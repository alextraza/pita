@extends('admin.main')

@section('title')
    Добавить пользователя
@endsection

@section('breadcrumb')
    <div class="breadcrumb-top">
        <div class="header">
            Добавить пользователя
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">Заказы</a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">Пользователи</a>
                </li>
                <li>
                    <span>Добавить</span>
                </li>
            </ul>
        </div>
    </div>
@endsection


@section('content')
    <div class="dock">
        <form method="POST" id="createCategory" action="{{ route('user.store') }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="dock__header dock__header--fill">
                <a class="btn btn--red" href="{{ route('user.index') }}">Отменить</a>
                <div class="flex">
                    <input class="btn" name="save" type="submit" value="Сохранить"/>
                    <input class="btn btn--yellow" name="apply" type="submit" value="Применить"/>
                </div>
            </div>
            <div class="form__inner">
                @include('admin.user.form')
            </div>
            <div class="dock__foot dock__foot--fill">
                <a class="btn btn--red" href="{{ route('user.index') }}">Отменить</a>
                <div class="flex">
                    <input class="btn" name="save" type="submit" value="Сохранить"/>
                    <input class="btn btn--yellow" name="apply" type="submit" value="Применить"/>
                </div>
            </div>
        </form>
    </div>
@endsection
