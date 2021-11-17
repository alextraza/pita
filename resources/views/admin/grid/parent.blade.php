@isset($options)
{{ $options['list']->find($model->{$options['attr']})->header }}
@else
{{ $model->{$options['attr']} }}
@endisset
