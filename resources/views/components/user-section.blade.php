<div class="user__section">

    <div class="user__block">

        <div class="user__data">


            <div class="user__b__heading">Привет,  {{ $user->name }}!</div>
            <div class="user__b__subtitle">Здесь ты можешь изменить информацию о себе</div>

            <form action="{{ route('user.save') }}" method="post">
                @csrf
                <div class="form__group__add user__form">

                    <div class="form__field__add name">
                        <label for="name">Имя</label>
                        <input id="name" type="text" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form__field__add phone @error('phone') error @enderror">
                        <label for="phone">Телефон</label>
                        <input id="phone" type="text" data-js="input" name="phone" placeholder="8 (xxx) xxx-xx-xx"
                               value="{{ old('phone', $user->formatted_phone) }}">
                        @error('phone')
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @enderror
                    </div>
                    <div class="form__field__add pass @error('password') error @enderror">
                        <label for="password">Пароль</label>
                        <input id="password" type="password" name="password" value="">
                        @error('password')
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @enderror
                    </div>
                    <div class="form__field__add rep-pass @error('password_confirmation') error @enderror">
                        <label for="password">Подтвердите пароль</label>
                        <input id="password" type="password" name="password_confirmation">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @enderror
                    </div>
                    <div class="form__field__add email @error('email') error @enderror">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email" value="{{ old('email', $user->email) }}"
                               title="Для восстановления пароля">
                        @error('email')
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @enderror
                    </div>
                    <div>
                        <button class="user__btn" type="submit">Сохранить</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
    <div class="user__block address">
        <div class="user__data">
            <div class="user__b__heading">Список адресов</div>
            <div class="user__address__con">
                <span>
                    Добавь несколько адресов, по которым чаще всего заказываешь пиццу. Это избавит от необходимости
                    вносить данные о
                    месте доставки.
                </span>
            </div>

          
                
            <div class="user__address__list">
                @foreach ($user->addresses as $address)
                    <div class="address__item">
                        <div class="address__title">{{ $address->full_address }}</div>
                        <div><a class="edit-address" data-id="{{ $address->id }}" data-action="edit"
                                href="{{ route('user.address') }}">Изменить</a> <a class="rm-address"
                                                                                   data-id="{{ $address->id }}" data-action="remove" href="{{ route('user.address') }}">Удалить</a></div>
                    </div>
                @endforeach

            </div>
       

            <div class="user__address__add">


                {{-- Начало формы --}}

                <div class="user__b__heading">Добавить адрес</div>

                <div id="addressForm">
                    @include('components.address')
                </div>

                {{-- Конец формы --}}
            </div>
        </div>

    </div>

</div>
