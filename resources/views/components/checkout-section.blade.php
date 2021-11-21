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
            <input type="radio" class="input__tab" name="tabset_1" id="tabset_1_description" hidden
                aria-hidden="true" checked>
            <input type="radio" class="input__tab" name="tabset_1" id="tabset_1_statistics" hidden
                aria-hidden="true">
            <ul hidden aria-hidden="true">

                <li><label for="tabset_1_description">Заберу сам</label></li>
                <li><label for="tabset_1_statistics">Курьером</label></li>

            </ul>
            <div>
                <section>
                    <h2>Наш адрес</h2>
                    <p>{{ \App\Models\Config::address() }}</p>
                    <div class="map">
                        {!! \App\Models\Config::map() !!}

                    </div>
                </section>
                <section>

                    <div class="form__group">
                        <h2>Куда доставить пиццу?</h2>
                        <div class="form__field">
                            <input type="radio" id="address-1" name="client-address" value="address-1">
                            <label for="address-1">Лиговский переулок, дом.26, кв.23, 2 подъезд, 4 этаж , домофон:
                                365</label>
                        </div>
                        <div class="form__field">
                            <input type="radio" id="address-2" name="client-address" value="address-2">
                            <label for="address-2">Васильева , дом.167, кв.55, 2 подъезд, 2 этаж , домофон: 124</label>
                        </div>
                        <div class="form__field">
                            <input type="radio" id="address-3" name="client-address" value="address-3" checked>
                            <label for="address-3">Ввести адрес</label>
                        </div>
                    </div>
                    <div class="form__group__add">
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
                        <div class="form__field__add comment">
                            <label for="comment">Комментарий к заказу</label>
                            <textarea name="text" id="comment" cols="30" rows="6"></textarea>
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
    </div>
    <div class="delivery__sec"></div>
 
</div>
