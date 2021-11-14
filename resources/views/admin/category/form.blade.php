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
            <label>Картинка</label>
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
