<div>
    <form method="post" id="checkoutForm" action="{{ route('checkout.store') }}">
        @method('PUT')
        @csrf()
        <div class="checkout__section">
            <div class="delivery__sec">
                <div class="delivery__heading">
                    <div class="title">1. Доставка</div>
                    <div><a href="/register">Зарегистрировались?</a> <a href="/login">Войти<svg
                                                                                               xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 24" fill="none"
                                                                                               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                                               class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg></a></div>
                </div>
                <div class="tabset">
                    <input type="radio" class="input__tab" name="delivery" value="myself" id="tabset_1_description" hidden
                           aria-hidden="true" checked>
                    <input type="radio" class="input__tab" name="delivery" value="delivery" id="tabset_1_statistics" hidden
                           aria-hidden="true">
                    <ul hidden aria-hidden="true">
                        <li><label for="tabset_1_description">Заберу сам</label></li>
                        <li><label for="tabset_1_statistics">Курьером</label></li>
                    </ul>
                    <div>
                        <section>
                            <h2>Наш адрес</h2>
                            <p>{{ \App\Models\Config::address() }}</p>
                            <a href="https://yandex.ru/maps/org/pita_pizza/129261506580/" target="_blank">Посмотреть на
                                карте</a>
                            <div class="map">
                                {!! \App\Models\Config::map() !!}

                            </div>
                        </section>

                        <section>
                            <div class="form__group">
                                <h2>Куда доставить пиццу?</h2>
                                @if ($user = Auth::user())
                                    @foreach ($user->addresses as $key => $address)
                                        <div class="form__field">
                                            <input type="radio" id="address-{{ $key }}" name="client-address" value="{{ $address->full_address }}" {{ $key == 0 ? 'checked' : ''  }}>
                                            <label for="address-{{ $key }}">{{ $address->full_address }}</label>
                                        </div>
                                    @endforeach
                                    <div class="form__field">
                                        <input type="radio" id="address-3" name="client-address" value="address-3">
                                        <label for="address-3">Ввести адрес</label>
                                    </div>
                                @else
                                    <div class="label">
                                        Адрес доставки
                                    </div>
                                @endif
                            </div>
                            <div class="form__group__add address__form">
                                <div class="form__field__add street">
                                    <label for="street">Адрес (улица)<span>*</span></label>
                                    <input id="street" type="text" name="address">
                                </div>
                                <div class="form__field__add house">
                                    <label for="house">Номер дома<span>*</span></label>
                                    <input id="house" type="text" name="house">
                                </div>
                                <div class="form__field__add appartment">
                                    <label for="appartment">Квартира</label>
                                    <input id="appartment" type="text" name="apartment" >
                                </div>
                                <div class="form__field__add entrance">
                                    <label for="entrance">Подъезд</label>
                                    <input id="entrance" type="text" name="entrance">
                                </div>
                                <div class="form__field__add floor">
                                    <label for="floor">Этаж</label>
                                    <input id="floor" type="text" name="floor">
                                </div>
                                <div class="form__field__add client-code">
                                    <label for="client-code">Код домофона</label>
                                    <input id="client-code" type="text" name="code">
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="delivery__sec">
                <div class="delivery__heading">
                    <div class="title">2. Личные данные</div>
                </div>
                <div class="tabset">
                    <h2>Когда доставить пиццу?</h2>
                    <div class="form__group time__grid">

                        <div class="form__field now">
                            <input type="radio" id="now" name="delivery-time" value="now">
                            <label for="now">В ближайшее время</label>
                        </div>
                        <div class="form__field chose-time">
                            <input type="radio" id="chose-time" name="client-time">
                            <label for="chose-time">Указать время:</label>
                        </div>
                        <div class="form__field__add time">
                            <label for="chose-time">Указать время:</label>
                            <input type="time" id="time" name="delivery_time" value="time">
                        </div>

                    </div>
                    <div class="form__group__add client__form">
                        <div class="form__field__add name">
                            <label for="name">Имя</label>
                            <input id="name" type="text" name="name" value="@if (Auth::user()) {{ Auth::user()->name }} @endif">
                        </div>
                        <div class="form__field__add phone">
                            <label for="phone">Телефон<span>*</span></label>
                            <input id="phone" type="text" data-js="input" name="phone" id="phone" placeholder="8 (xxx) xxx-xx-xx"
                                   value="@if (Auth::user()) {{ Auth::user()->phone }} @endif">
                        </div>
                        <div class="form__field__add comment">
                            <label for="comment">Комментарий к заказу</label>
                            <textarea name="comment" id="comment" cols="30" rows="6"></textarea>
                        </div>

                    </div>
                    <div class="privacy">
                        Нажимая на кнопку “Заказать”, вы даёте согласие на <a href="/privacy-policy">обработку своих
                        персональных данных</a>, в соответствии с
                        <a href="/privacy-policy">“Политикой конфиденциальности”</a>.
                        Мы работаем каждый день с 10:00 до 23:00. Точное время доставки в уточняйте по номеру <a href="tel:{{ str_replace([' ', '(', ')', '-'], '', \App\Models\Config::phone()) }}">{{ \App\Models\Config::phone() }}</a>
                    </div>
                </div>

            </div>
            <div class="delivery__sec">
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
                    <button type="submit" class="primary__button">Оформить заказ</button>
                    <div>
                        <section>
                            <h2>Наш адрес</h2>
                            <p>{{ \App\Models\Config::address() }}</p>
                            <a href="https://yandex.ru/maps/org/pita_pizza/129261506580/" target="_blank">Посмотреть на
                                карте</a>
                            <div class="map">
                                {!! \App\Models\Config::map() !!}

                            </div>
                        </section>
                        <section>

                            <div class="form__group">
                                <h2>Как будете оплачивать?</h2>
                                <div class="form__field">
                                    <input type="radio" id="address-1" name="client-address" value="address-1">
                                    <label for="address-1">Оплата курьеру картой</label>
                                </div>
                                <div class="form__field">
                                    <input type="radio" id="address-2" name="client-address" value="address-2">
                                    <label for="address-2">Оплата курьеру наличными</label>
                                </div>

                            </div>
                            <div class="form__group__add address__form">
                                <div class="form__field__add street">
                                    <label for="street">Адрес (улица)<span>*</span></label>
                                    <input id="street" type="text">
                                </div>
                                <div class="form__field__add house">
                                    <label for="house">Номер дома<span>*</span></label>
                                    <input id="house" type="text">
                                </div>
                                <div class="form__field__add appartment">
                                    <label for="appartment">Квартира</label>
                                    <input id="appartment" type="text">
                                </div>
                                <div class="form__field__add entrance">
                                    <label for="entrance">Подъезд</label>
                                    <input id="entrance" type="text">
                                </div>
                                <div class="form__field__add floor">
                                    <label for="floor">Этаж</label>
                                    <input id="floor" type="text">
                                </div>
                                <div class="form__field__add client-code">
                                    <label for="client-code">Код домофона</label>
                                    <input id="client-code" type="text">
                                </div>


                            </div>

                        </section>


                    </div>
                </div>
            </div>
    </form>
        </div>
</div>
