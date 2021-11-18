<th class="@if ($modelName::isSorting($attr)) sorting @endif @if (isset($sort[$attr])) {{ $sort[$attr] == 'asc' ? 'asc' : 'desc' }} @endif">
    <input type="hidden" name="sort[{{ $attr }}]" value="@if ($modelName::isSorting($attr))@if (isset($sort[$attr])){{ $sort[$attr] == 'asc' ? 'asc' : 'desc' }}@endif{{""}}@endif" />
    @if ($modelName::isFiltering($attr))
        <a class="filter @if (isset($filter[$attr])) active @endif" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
        </a>
        <input class="filter-input" type="text" name="filter[{{ $attr }}]" value="@if (isset($filter[$attr])){{ $filter[$attr] }}@endif" />
    @endif
    {{ $name }}
</th>
