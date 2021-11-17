<a class="changeStatus" href="{{ route('category.change_status', ['id' => $model->id]) }}">
@if ($model->status)
        <span class="status accept">
        </span>
@else
    <span class="status denied">
    </span>
@endif
</a>
