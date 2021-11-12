@extends('auth.main')

@section('title')
    Авторизация в системе
@endsection

@section('content')
    <main class="login-form">
        <div class="login-form__window">
            <div class="header">Авторизация</div>
            @if(session('success'))
                {{ session('success') }}
            @endif
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="form-group @error('email') has-error @enderror">
                    <input type="text" placeholder="Email" id="email" name="email" value="{{ old('email') }}"
                           autofocus>
                    @error('email')
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @enderror
                </div>

                <div class="form-group @error('password') has-error @enderror">
                    <input type="password" placeholder="Пароль" id="password" class="form-control" name="password" required>
                    @error('password')
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Запомнить меня
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark btn-block">Войти</button>
            </form>
        </div>
        </div>
    </main>
@endsection
