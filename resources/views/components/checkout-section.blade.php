<div>
    <form method="post" id="checkoutForm" action="{{ route('checkout.store') }}">
        @method('PUT')
        @csrf()
        <div class="checkout__section">
            <div class="delivery__sec first">
                <div class="delivery__heading">
                    <div class="title">1. Доставка</div>
                </div>
                <div class="tabset">
                    <input type="radio" class="input__tab" name="delivery" value="myself" id="tabset_1_description"
                        hidden aria-hidden="true" @if (!old('delivery') || old('delivery') == 'myself') checked @endif>
                    <input type="radio" class="input__tab" name="delivery" value="delivery" id="tabset_1_statistics"
                        hidden {{ old('delivery') == 'delivery' ? 'checked' : '' }} aria-hidden="true">
                    <ul hidden aria-hidden="true">
                        <li><label for="tabset_1_description">Курьером</label></li>
                        <li><label for="tabset_1_statistics">Заберу сам</label></li>
                    </ul>
                    <div>


                        <section>
                            <div class="form__group">
                                <div class="sec__title">Куда доставить пиццу?</div>
                                @if ($user = Auth::user())
                                    @foreach ($user->addresses as $key => $address)
                                        <div class="form__field">
                                            <input type="radio" id="address-{{ $key }}" name="client_address"
                                                value="{{ $address->full_address }}"
                                                {{ $key == 0 ? 'checked' : '' }}>
                                            <label
                                                for="address-{{ $key }}">{{ $address->full_address }}</label>
                                        </div>
                                    @endforeach
                                    @if ($user->addresses->isEmpty())
                                        <div class="user__b__subtitle">
                                            Добавить адреса вы можете в личном кабинете <a
                                                href="{{ route('user') }}">Войти</a></div>
                                    @else
                                        <div class="form__field">
                                            <input type="radio" id="address-3" name="client_address">
                                            <label for="address-3">Ввести адрес</label>
                                        </div>
                                    @endif
                                @else
                                    <input type="hidden" id="address-3" name="client_address" value="on">
                                    <div class="user__b__subtitle">
                                        <a id="login">Войти</a>
                                        <a id="register">Зарегистрироваться</a> 
                                    </div>
                                @endif
                            </div>
                            <div class="form__group__add address__form">
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
                                    <input id="appartment" type="text" name="apartment"
                                        value="{{ old('apartment') }}">
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
                            </div>
                        </section>
                        <section>
                            <div class="sec__title">Наш адрес</div>
                           

                            <div class="map">
                                <div class="user__b__subtitle">{{ \App\Models\Config::address() }} <a
                                    href="https://yandex.ru/maps/org/pita_pizza/129261506580/"
                                    target="_blank">Посмотреть на
                                    карте</a></div>
                                {!! \App\Models\Config::map() !!}

                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="delivery__sec second">
                <div class="delivery__heading">
                    <div class="title">2. Личные данные</div>
                </div>
                <div class="tabset">
                    <div class="sec__title">Когда доставить пиццу?</div>

                    <div class="form__group time__grid">

                        <div class="form__field now">
                            <input type="radio" id="now" name="delivery_time" value="В ближайшее время" checked>
                            <label for="now">В ближайшее время</label>
                        </div>
                        <div class="form__field chose-time">
                            <input type="radio" id="delivery-time" name="delivery_time" value="time">
                            <label for="delivery-time">Выбрать время:</label>
                        </div>
                        <div class="form__field__add time">
                            <label for="chose-time">Время:</label>
                            <input type="time" id="chose-time" name="chose_time" value="time">
                        </div>

                    </div>
                    <div class="form__group__add client__form">
                        <div class="form__field__add name">
                            <label for="name">Имя</label>
                            <input id="name" type="text" name="name" value="@if (Auth::user()) {{ Auth::user()->name }} @endif">
                        </div>
                        <div class="form__field__add phone @error('phone') error @enderror">
                            <label for="phone">Телефон<span>*</span></label>
                            <input id="phone" type="text" data-js="input" name="phone" id="phone"
                                placeholder="8 (xxx) xxx-xx-xx" value="@if (Auth::user()) {{ old('phone', Auth::user()->formatted_phone) }} @else {{ old('phone') }} @endif">
                            @error('phone')
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @enderror
                        </div>
                        <div class="form__field__add comment">
                            <label for="comment">Комментарий к заказу</label>
                            <textarea name="comment" id="comment" cols="30" rows="4"></textarea>
                        </div>

                    </div>

                </div>

            </div>
            <div class="delivery__sec third">
                <div class="delivery__heading">
                    <div class="title">3. Оплата</div>

                </div>
                <div class="tabset">
                    <input type="radio" class="input__tab" name="tabset_2" id="tabset_2_description" hidden
                        aria-hidden="true" checked>
                    <input type="radio" class="input__tab" name="tabset_2" id="tabset_2_statistics" hidden
                        aria-hidden="true">
                    <ul hidden aria-hidden="true">

                        <li><label for="tabset_2_description">Он-лайн</label></li>
                        <li><label for="tabset_2_statistics">Курьеру</label></li>

                    </ul>

                    <div>
                        <section>
                            <div class="sec__title">Какой-то текст</div>

                        </section>
                        <section>
                            <div class="form__group">
                                <div class="sec__title">Как будете оплачивать?</div>
                                <div>
                                <div class="form__field">
                                    <input type="radio" id="address-1" name="client-address" value="address-1" checked>
                                    <label for="address-1">Оплата курьеру картой</label>
                                </div>
                                <div class="form__field">
                                    <input type="radio" id="address-2" name="client-address" value="address-2">
                                    <label for="address-2">Оплата курьеру наличными / Самовывоз</label>
                                </div>
                            </div>
                        </section>


                    </div>
                    <button type="submit" class="primary__button">Оформить заказ</button>
                    <div class="privacy">
                        Нажимая на кнопку Оформить заказ, вы даёте согласие на <a href="/privacy-policy">обработку
                            персональных данных</a>, в соответствии с
                        <a href="/privacy-policy">“Политикой конфиденциальности”</a>.
                        Мы работаем каждый день с 10:00 до 23:00. Точное время доставки в уточняйте по номеру <a
                            href="tel:{{ str_replace([' ', '(', ')', '-'], '', \App\Models\Config::phone()) }}">{{ \App\Models\Config::phone() }}</a>
                    </div>
                </div>
            </div>
    </form>
</div>
</div>
