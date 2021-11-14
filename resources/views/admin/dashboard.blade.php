@extends('admin.main')

@section('content')
    <div class="dock">
        <div class="dock__header">
            <a class="btn" href="#">+ Добавить</a>
            <a class="btn btn--transparent" href="#">- Удалить</a>
        </div>
        @include('admin.order.index')
    </div>
@endsection
