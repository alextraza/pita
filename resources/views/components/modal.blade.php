<div id="#" class="modal active">
    <div class="modal__overlay">
    </div>
    <div class="modal__window">



        <div class="modal__inner">
            <div class="delivery__sec first">
                <div class="delivery__heading">
                    <div class="title">Личный кабинет</div>
                    <div class="modal__close">&times;</div>
                </div>
                <div class="tabset">
                    <input type="radio" class="input__tab" name="delivery" value="myself" id="tabset_login" hidden
                        aria-hidden="true" @if (!old('delivery') || old('delivery') == 'myself') checked @endif>
                    <input type="radio" class="input__tab" name="delivery" value="delivery" id="tabset_register"
                        hidden {{ old('delivery') == 'delivery' ? 'checked' : '' }} aria-hidden="true">
                    <input type="radio" class="input__tab" name="forgot_password" value="forgot_password"
                        id="forgot_password" hidden {{ old('delivery') == 'delivery' ? 'checked' : '' }}
                        aria-hidden="true">
                    <ul hidden aria-hidden="true">
                        <li><label for="tabset_login">Войти</label></li>
                        <li><label for="tabset_register">Регистрация</label></li>
                    </ul>
                    <div>
                        <section>

                            <div class="form__group__add ">

                                <div class="form__field__add">
                                    <label for="phone">Телефон</label>
                                    <input id="phone" type="phone" data-js="input" name="phone"
                                        placeholder="8 (xxx) xxx-xx-xx" value="  ">
                                </div>
                                <div class="form__field__add">
                                    <label for="password">Пароль</label>
                                    <input id="password" type="password" name="phone" value="">
                                </div>
                                <div class="form__field__add">
                                    <label for="forgot_password">Забыли пароль</label>
                                   
                                   
                                </div>
                                <button type="submit">Войти</button>
                            </div>
                          
                        </section>
                        <section>
                            <div class="form__group__add client__form">
                                <div class="form__field__add name">
                                    <label for="name">Имя</label>
                                    <input id="name" type="text" name="name" value="">
                                </div>
                                <div class="form__field__add">
                                    <label for="phone">Телефон</label>
                                    <input id="phone" type="text" data-js="input" name="phone"
                                        placeholder="8 (xxx) xxx-xx-xx" value="  ">
                                </div>
                                <div class="form__field__add">
                                    <label for="password">Пароль</label>
                                    <input id="password" type="password" name="phone" value="">
                                </div>
                                <div class="form__field__add">
                                    <label for="password">Подтвердите пароль</label>
                                    <input id="password" type="password" name="phone" value="">
                                </div>
                                <button type="submit">Войти</button>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
