@method('put')
@csrf
<input type="hidden" name="id" value="{{ $model->id ?? '' }}" />
    <div class="form__field__add street @error('street') has-error @enderror">
        <label for="street">Адрес (улица)<span>*</span></label>
        <input id="street" type="text" name="street" value="{{ old('street') }}">
        @error('street')
            <span class="text-danger">{{ $errors->first('street') }}</span>
        @enderror
    </div>
    <div class="form__field__add house  @error('house') has-error @enderror">
        <label for="house">Номер дома<span>*</span></label>
        <input id="house" type="text" name="house" value="{{ old('house') }}">
        @error('house')
            <span class="text-danger">{{ $errors->first('house') }}</span>
        @enderror
    </div>
    <div class="form__field__add appartment @error('apartment') has-error @enderror">
        <label for="appartment">Квартира</label>
        <input id="appartment" type="text" name="apartment" value="{{ old('apartment') }}">
        @error('apartment')
            <span class="text-danger">{{ $errors->first('apartment') }}</span>
        @enderror
    </div>
    <div class="form__field__add entrance @error('entrance') has-error @enderror">
        <label for="entrance">Подъезд</label>
        <input id="entrance" type="text" name="entrance" value="{{ old('entrance') }}">
        @error('entrance')
            <span class="text-danger">{{ $errors->first('entrance') }}</span>
        @enderror
    </div>
    <div class="form__field__add floor @error('floor') has-error @enderror">
        <label for="floor">Этаж</label>
        <input id="floor" type="text" name="floor" value="{{ old('floor') }}">
        @error('floor')
            <span class="text-danger">{{ $errors->first('floor') }}</span>
        @enderror
    </div>
    <div class="form__field__add client-code @error('floor') has-error @enderror">
        <label for="client-code">Код домофона</label>
        <input id="client-code" type="text" name="code" value="{{ old('floor') }}">
        @error('code')
            <span class="text-danger">{{ $errors->first('code') }}</span>
        @enderror
    </div>
    <button class="user__btn" type="submit">Сохранить</button>
