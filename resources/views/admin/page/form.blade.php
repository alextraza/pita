<div class="row">
    <div class="md-4">
        <div class="form-group @error('slug') has-error @enderror">
            <label>Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $model->slug) }}" />
            @error('slug')
            <span class="text-danger">{{ $errors->first('slug') }}</span>
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
                        <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
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
    <div class="md-4">
        <div class="form-group @error('title') has-error @enderror">
            <label>Meta Title</label>
            <input type="text" name="title" value="{{ old('title', $model->title) }}" />
            @error('title')
            <span class="text-danger">{{ $errors->first('title') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-8">
        <div class="form-group @error('description') has-error @enderror">
            <label>Meta Description</label>
            <textarea rows="2" name="description">{{ old('"description', $model->description) }}</textarea>
            @error('description')
            <span class="text-danger">{{ $errors->first('description') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('pos') has-error @enderror">
            <label>Позиция</label>
            <input type="text" name="pos" value="{{ old('pos', $model->pos) }}" />
            @error('pos')
            <span class="text-danger">{{ $errors->first('pos') }}</span>
            @enderror
        </div>
        <div class="row">
            <div class="md-6">
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
    <div class="md-4">
        <div class="row">
        </div>
    </div>
</div>
