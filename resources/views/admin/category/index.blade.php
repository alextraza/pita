@extends('admin.main')

@section('title')
    Категории
@endsection


@section('content')
    <div class="dock">
        <div class="dock__header">
            <a class="btn" href="#">+ Добавить</a>
            <a class="btn btn--transparent" href="#">- Удалить</a>
        </div>
        @include('admin.category.grid')
    </div>
@endsection
