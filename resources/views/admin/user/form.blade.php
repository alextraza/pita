<div class="row">
    <div class="md-4">
        <div class="form-group @error('name') has-error @enderror">
            <label>Имя</label>
            <input type="text" name="name" value="{{ old('name', $model->name) }}" />
            @error('name')
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('email') has-error @enderror">
            <label>Email</label>
            <input type="text" name="email" value="{{ old('email', $model->email) }}" />
            @error('email')
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('phone') has-error @enderror">
            <label>Телефон</label>
            <input type="text" name="phone" value="{{ old('phone', $model->phone) }}" />
            @error('title')
            <span class="text-danger">{{ $errors->first('title') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-4">
        <div class="form-group @error('password') has-error @enderror">
            <label>Пароль</label>
            @if (request()->segment(3) == 'edit')
                <input type="password" name="password" value="{{ old('password') }}" />
            @else
                <input type="password" name="password" value="{{ old('password', $model->password) }}" />
            @endif
            @error('password')
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @enderror
        </div>
    </div>
    <div class="md-2">
        <div class="form-group @error('status') has-error @enderror">
            <label for="is_admin">
                Админ права
            </label>
            <div class="checkbox">
                <input type="hidden" name="is_admin" value="0" />
                <input id="is_admin" type="checkbox" name="is_admin" value="1" @if (old('is_admin', $model->is_admin)) checked @endif />
                Является администратором
            </div>
            @error('is_admin')
            <span class="text-danger">{{ $errors->first('is_admin') }}</span>
            @enderror
        </div>
    </div>
</div>
