@extends('admin.main')

@section('content')
    <div class="dock">
        <div class="dock__header">
            <a class="btn" href="{{ route('order.create') }}">+ Добавить</a>
            <a id="massDel" class="btn btn--transparent del disabled" href="#">- Удалить</a>
        </div>
        @include('admin.order.grid')
    </div>
@endsection
