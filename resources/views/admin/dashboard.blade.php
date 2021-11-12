@extends('admin.main')

@section('title')
    Заказы
@endsection

@section('content')
    <div class="dock">
        <div class="dock__header">
            <a class="btn" href="#">+ Добавить</a>
            <a class="btn btn--transparent" href="#">- Удалить</a>
        </div>
        <div class="table-responsive">
            <table class="table-stripped">
                <tr>
                    <th><input type="checkbox" name="all" /></th>
                    <th>id</th>
                    <th>Дата</th>
                    <th>Клиент</th>
                    <th>Статус</th>
                    <th>Действие</th>
                </tr>
                <tr>
                    <td><input type="checkbox" name="item[]" value="1" /></td>
                    <td>1</td>
                    <td>{{ date('d.m.Y') }}</td>
                    <td>Гурдин Кирюха</td>
                    <td><span class="badge pending">Новый</span></td>
                    <td>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="item[]" value="2" /></td>
                    <td>2</td>
                    <td>{{ date('d.m.Y') }}</td>
                    <td>Голубев Дмитрий</td>
                    <td><span class="badge completed">Завершен</span></td>
                    <td>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dock__foot">
            <div class="page-info">
                Показано 2 объекта из 2
            </div>
            <div class="paginator">

            </div>
        </div>
    </div>
@endsection
