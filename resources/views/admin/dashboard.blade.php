@extends('admin.main')

@section('breadcrumb')
    <div class="breadcrumb-top">
        <div class="header">
            Заказы
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">Заказы</a>
                </li>
                <li>
                    <span>Заказы</span>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="dock">
        <div class="dock__header">
            <a id="massDel" class="btn btn--transparent del disabled" href="{{ route('order.delete') }}">- Удалить</a>
        </div>
        @include('admin.order.grid')
    </div>
@endsection
