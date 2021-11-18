<div class="table-responsive">
    <table class="table-stripped data-table">
        <form method="get" id="filter-search">
            <tr>
                <th><input id="checkAll" type="checkbox" name="all" /></th>
                @include('admin.grid.header', ['attr' => 'id', 'name' => 'Id'])
                @include('admin.grid.header', ['attr' => 'name', 'name' => 'Имя'])
                @include('admin.grid.header', ['attr' => 'email', 'name' => 'Email'])
                @include('admin.grid.header', ['attr' => 'phone', 'name' => 'Телефон'])
                <th>Действие</th>
            </tr>
        </form>
        @foreach($models as $model)
            <tr>
                <td><input class="checkMe" type="checkbox" name="item[]" value="{{ $model->id }}" /></td>
                <td>@if ($model->is_admin)
                    <span class="admin-star"> {{ $model->id }} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span>
                @else
                    {{ $model->id }}
                @endif </td>
                <td>{{ $model->name }}</td>
                <td>{{ $model->email }}</td>
                <td>{{ $model->phone }}</td>
                <td>
                    <div class="action-field">
                        <a href="#" class="dd-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </a>
                        <div class="dd-container">
                            <a href="{{ route('user.delete', ['id' => $model->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 me-50 font-small-4"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                Удалить
                            </a>
                            <a href="{{ route('user.archive', ['id' => $model->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive me-50 font-small-4"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                                Архивировать
                            </a>
                        </div>
                        <a href="{{ route('user.edit', ['id' => $model->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-small-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
<div class="dock__foot">
    {{ $models->onEachSide(3)->links() }}
</div>
