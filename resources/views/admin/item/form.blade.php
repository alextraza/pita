<div class="row">
    <div class="md-4">
        <div class="form-group @error('category_id') has-error @enderror">
            <label>Категория</label>
            <select id="category_id" name="category_id">
                <option>------</option>
                @foreach ($categoryList as $listItem)
                    <option value="{{ $listItem->id }}" @isset($model->category_id)@if ($model->category_id == $listItem->id) selected @endif @endisset>
                        {{ $listItem->header }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-danger">{{ $errors->first('category_id') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('header') has-error @enderror">
            <label>Название</label>
            <input type="text" name="header" value="{{ old('header', $model->header) }}" />
            @error('header')
                <span class="text-danger">{{ $errors->first('header') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('image') has-error @enderror">
            <label class="image">
                Картинка
                @if ($model->image)
                    <a class="showImage" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                    </a>
                    <div class="img__wrapper">
                        <div class="img__inner">
                            <img src="{{ ImageHelper::thumb($model->image, 200, 200) }}" alt="" />
                            <a class="close" href="#">&times;</a>
                            <a class="delete" href="{{ route('category.img_delete', ['id' => $model->id, 'attr' => 'image']) }}">
                                Удалить
                            </a>
                        </div>
                    </div>
                @endif
            </label>
            <input type="file" name="image" value="{{ old('image') }}" />
            @error('image')
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-2">
        <div class="form-group @error('pos') has-error @enderror">
            <label>Позиция</label>
            <input type="text" name="pos" value="{{ old('pos', $model->pos) }}" />
            @error('pos')
                <span class="text-danger">{{ $errors->first('pos') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-2">
        <div class="form-group @error('energy') has-error @enderror">
            <label>Калорийность</label>
            <input type="text" name="energy" value="{{ old('energy', $model->energy) }}" />
            @error('energy')
                <span class="text-danger">{{ $errors->first('energy') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-2">
        <div class="form-group @error('proteins') has-error @enderror">
            <label>Белки (г)</label>
            <input type="text" name="proteins" value="{{ old('proteins', $model->proteins) }}" />
            @error('proteins')
                <span class="text-danger">{{ $errors->first('proteins') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-2">
        <div class="form-group @error('fats') has-error @enderror">
            <label>Жиры (г)</label>
            <input type="text" name="fats" value="{{ old('fats', $model->fats) }}" />
            @error('fats')
                <span class="text-danger">{{ $errors->first('fats') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-2">
        <div class="form-group @error('carbo') has-error @enderror">
            <label>Углеводы (г)</label>
            <input type="text" name="carbo" value="{{ old('carbo', $model->carbo) }}" />
            @error('carbo')
                <span class="text-danger">{{ $errors->first('carbo') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-2">
        <div class="form-group @error('capacity') has-error @enderror">
            <label>Объем</label>
            <input type="text" name="capacity" value="{{ old('capacity', $model->capacity) }}" />
            @error('capacity')
                <span class="text-danger">{{ $errors->first('capacity') }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="md-4">
        <div class="row">
            <div class="md-6">
                <div class="form-group @error('status') has-error @enderror">
                    <label for="status">
                        Статус
                    </label>
                    <div class="checkbox">
                        <input type="hidden" name="status" value="0" />
                        <input id="status" type="checkbox" name="status" value="1" @if (old('status', $model->status)) checked @endif />
                        Опубликован
                    </div>
                    @error('status')
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                    @enderror
                </div>
            </div>
            <div class="md-6">
                <div class="form-group @error('has_alt') has-error @enderror">
                    <label for="has_alt">
                        Вариан
                    </label>
                    <div class="checkbox">
                        <input type="hidden" name="has_alt" value="0" />
                        <input id="has_alt" type="checkbox" name="has_alt" value="1" @if (old('status', $model->has_alt)) checked @endif />
                        Есть вариант
                    </div>
                    @error('has_alt')
                    <span class="text-danger">{{ $errors->first('has_alt') }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="md-6">
                <div class="form-group @error('price') has-error @enderror">
                    <label>Цена</label>
                    <input type="text" name="price" value="{{ old('price', $model->price) }}" />
                    @error('price')
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @enderror
                </div>
            </div>
            <div class="md-6">
                <div class="form-group @error('weight') has-error @enderror">
                    <label>Вес (г)</label>
                    <input type="text" name="weight" value="{{ old('weight', $model->weight) }}" />
                    @error('weigth')
                        <span class="text-danger">{{ $errors->first('weight') }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div id='alter' class="row @if (!$model->has_alt) hidden @endif">
            <div class="card-header">
                Альтернативный вариант
            </div>
            <div class="md-6">
                <div class="form-group @error('price_alt') has-error @enderror">
                    <label>Цена</label>
                    <input type="text" name="price_alt" value="{{ old('price_alt', $model->price_alt) }}" />
                    @error('price_alt')
                    <span class="text-danger">{{ $errors->first('price_alt') }}</span>
                    @enderror
                </div>
            </div>
            <div class="md-6">
                <div class="form-group @error('weight_alt') has-error @enderror">
                    <label>Вес (г)</label>
                    <input type="text" name="weight_alt" value="{{ old('weight_alt', $model->weight_alt) }}" />
                    @error('weight_alt')
                    <span class="text-danger">{{ $errors->first('weight_alt') }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="md-8">
        <div class="form-group @error('content_raw') has-error @enderror">
            <label>Описание</label>
            <textarea name="content_raw" id="content">{{ old('content_raw', $model->content_raw) }}</textarea>
            @error('content_raw')
            <span class="text-danger">{{ $errors->first('content_raw') }}</span>
            @enderror
        </div>
    </div>
</div>

