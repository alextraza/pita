<th class="@if ($modelName::isSorting($attr)) sorting @endif @if (isset($sort[$attr])) {{ $sort[$attr] == 'asc' ? 'asc' : 'desc' }} @endif">
    <input type="hidden" name="sort[{{ $attr }}]" value="@if ($modelName::isSorting($attr))@if (isset($sort[$attr])){{ $sort[$attr] == 'asc' ? 'asc' : 'desc' }}@endif{{""}}@endif" />
    @if ($modelName::isFiltering($attr))
        <a class="filter @if (isset($filter[$attr])) active @endif" href="#" title="Удерживате Shif, чтобы очистить">
            <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
        </a>
        @if (!isset($list))
        <input class="filter-input" type="text" name="filter[{{ $attr }}]" value="@if (isset($filter[$attr])){{ $filter[$attr] }}@endif" />
        @else
        <select class="filter-input" name="filter[{{ $attr }}]">
            <option data-placeholder="true"></option>
            @if (gettype($list) == 'array')
                @foreach ($list as $key => $item)
                    <option value="{{  $key }}" @if (isset($filter[$attr]) && $filter[$attr] == $key) selected @endif>{{ $item }}</option>
                @endforeach
            @else
                @foreach ($list as $item)
                    <option value="{{  $item->id }}" @if (isset($filter[$attr]) && $filter[$attr] == $item->id) selected @endif>{{ $item->header }}</option>
                @endforeach
            @endif
        </select>
        @endif
    @endif
    {{ $name }}
</th>
