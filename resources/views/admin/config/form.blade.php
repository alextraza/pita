<div class="row">
    <div class="md-4">
        <div class="form-group @error('email') has-error @enderror">
            <label>Email</label>
            <input type="text" name="email" value="{{ old('email', $model::email()) }}" />
            @error('email')
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('phone') has-error @enderror">
            <label>Телефон</label>
            <input type="text" name="phone" value="{{ old('phone', $model::phone()) }}" />
            @error('phone')
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('address') has-error @enderror">
            <label>Адрес</label>
            <input type="text" name="address" value="{{ old('address', $model::address()) }}" />
            @error('address')
                <span class="text-danger">{{ $errors->first('address') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('description') has-error @enderror">
            <label>Description главной</label>
            <textarea rows="2" name="description">{{ old('description', $model::description()) }}</textarea>
            @error('description')
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('map') has-error @enderror">
            <label>Код карты</label>
            <textarea rows="2" name="map">{{ old('map', $model::map()) }}</textarea>
            @error('map')
                <span class="text-danger">{{ $errors->first('map') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('jivosite') has-error @enderror">
            <label>Код живосайта</label>
            <textarea rows="2" name="jivosite">{{ old('jivosite', $model::jivosite()) }}</textarea>
            @error('jivosite')
                <span class="text-danger">{{ $errors->first('jivosite') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('title') has-error @enderror">
            <label>Title главной</label>
            <input type="text" name="title" value="{{ old('title', $model::title()) }}" />
            @error('title')
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-2">
        <div class="form-group @error('gtm') has-error @enderror">
            <label>Идентификатор GTM</label>
            <input type="text" name="gtm" value="{{ old('gtm', $model::gtm()) }}" />
            @error('gtm')
                <span class="text-danger">{{ $errors->first('gtm') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-2">
        <div class="form-group @error('yam') has-error @enderror">
            <label>Метрика</label>
            <input type="text" name="yam" value="{{ old('yam', $model::yam()) }}" />
            @error('yam')
                <span class="text-danger">{{ $errors->first('yam') }}</span>
            @enderror
        </div>
    </div>

</div>
