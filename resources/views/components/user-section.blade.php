<div class="user__section">

    <div class="user__block">

        <div class="user__data">


            <div class="user__b__heading">Привет, %username!</div>
            <div class="user__b__subtitle">Здесь ты можешь изменить информацию о себе</div>

            <form action="">
                @csrf
                <div class="form__group__add client__form">

                    <div class="form__field__add name">
                        <label for="name">Имя</label>
                        <input id="name" type="text" name="name" value="">
                    </div>
                    <div class="form__field__add phone">
                        <label for="phone">Телефон</label>
                        <input id="phone" type="text" data-js="input" name="phone" placeholder="8 (xxx) xxx-xx-xx"
                            value="  ">
                    </div>
                    <div class="form__field__add pass">
                        <label for="password">Пароль</label>
                        <input id="password" type="password" name="password" value="">
                    </div>
                    <div class="form__field__add rep-pass">
                        <label for="password">Подтвердите пароль</label>
                        <input id="password" type="password" name="password_confirmation">
                    </div>
                    <div class="form__field__add email">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email">
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
                <div class="address__item">
                    <div class="address__title">Улица какая-то, дом 45, подъезд такой-то, квартира такая-то</div>

                    <div><a href="">Изменить</a> <a href="">Удалить</a></div>
                </div>
                <div class="address__item">
                    <div class="address__title">Улица какая-то, дом 45, подъезд такой-то, квартира такая-то</div>

                    <div><a href="">Изменить</a> <a href="">Удалить</a></div>
                </div>
                <div class="address__item">
                    <div class="address__title">Улица какая-то, дом 45, подъезд такой-то, квартира такая-то</div>

                    <div><a href="">Изменить</a> <a href="">Удалить</a></div>
                </div>

            </div>
            <button class="user__btn" type="submit">Добавить</button>
        </div>
        <div class="user__address__add">



            {{-- Начало формы --}}

            <div class="user__b__heading">Добавить адрес</div>

            <form id="address" class="form__group__add user__address__form">
                @include('components.address')
            </form>

            {{-- Конец формы --}}
        </div>
    </div>

</div>
