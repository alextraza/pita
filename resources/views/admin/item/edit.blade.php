@extends('admin.main')

@section('title')
    Изменить {{ $model->header }}
@endsection

@section('breadcrumb')
    <div class="breadcrumb-top">
        <div class="header">
            Изменить {{ $model->header }}
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">Заказы</a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}">Товары</a>
                </li>
                <li>
                    <span>Изменить</span>
                </li>
            </ul>
        </div>
    </div>
@endsection


@section('content')
    <div class="dock">
        <form method="POST" id="createCategory" action="{{ route('item.post', ['id' => $model->id]) }}" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="dock__header dock__header--fill">
                <a class="btn btn--red" href="{{ route('item.index') }}">Отменить</a>
                <div class="flex">
                    <input class="btn" name="save" type="submit" value="Сохранить"/>
                    <input class="btn btn--yellow" name="apply" type="submit" value="Применить"/>
                </div>
            </div>
            <div class="form__inner">
                @include('admin.item.form')
            </div>
            <div class="dock__foot dock__foot--fill">
                <a class="btn btn--red" href="{{ route('item.index') }}">Отменить</a>
                <div class="flex">
                    <input class="btn" name="save" type="submit" value="Сохранить"/>
                    <input class="btn btn--yellow" name="apply" type="submit" value="Применить"/>
                </div>
            </div>
        </form>
    </div>
@endsection
