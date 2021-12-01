<div id="userModal" class="modal">
    <div class="modal__overlay">
    </div>
    <div class="modal__window">
        <div class="modal__close">&times;</div>
        <div class="modal__inner">
            <div class="delivery__sec first">
                <div class="delivery__heading">
                    <div class="title">Авторизация</div>
                </div>
                <div class="tabset">
                    <input type="radio" class="input__tab" name="delivery" value="myself" id="tabset_login" hidden
                        aria-hidden="true" @if (!old('delivery') || old('delivery') == 'myself') checked @endif>
                    <input type="radio" class="input__tab" name="delivery" value="delivery" id="tabset_register"
                        hidden {{ old('delivery') == 'delivery' ? 'checked' : '' }} aria-hidden="true">
                    <input type="radio" class="input__tab" name="delivery" value="forgot_password"
                        id="forgot_password" hidden {{ old('delivery') == 'delivery' ? 'checked' : '' }}
                        aria-hidden="true">
                    <ul hidden aria-hidden="true">
                        <li><label for="tabset_login">Войти</label></li>
                        <li><label for="tabset_register">Регистрация</label></li>

                    </ul>
                    <div>
                        <section>
                            <form method="post" class="ajax-form" action="{{ route('login.user') }}">
                                @csrf
                                <div class="form__group__add ">
                                    <div class="form__field__add">
                                        <label for="log-phone">Телефон</label>
                                        <input id="log-phone" type="tel" data-js="input" name="phone"
                                            placeholder="8 (xxx) xxx-xx-xx" autocomplete="tel">
                                    </div>
                                    <div class="form__field__add">
                                        <label for="log-password">Пароль</label>
                                        <input id="log-password" type="password" name="password" autocomplete="current-password">
                                    </div>
                                    <div class="form__field__add bg_unset">
                                        <label for="forgot_password">Забыли пароль</label>

                                    </div>
                                    <div class="errors">
                                    </div>
                                    <button type="submit">Войти</button>
                                </div>
                            </form>
                        </section>

                        <section>
                            <form method="post" class="ajax-form" action="{{ route('register.user') }}">
                                @csrf
                                <div class="form__group__add reg__form">
                                    <div class="form__field__add">
                                        <label for="reg-email">Email*</label>
                                        <input id="reg-email" type="text" name="email" autocomplete="email">
                                    </div>
                                    <div class="form__field__add">
                                        <label for="reg-phone">Телефон*</label>
                                        <input id="reg-phone" type="tel" data-js="input" name="phone"
                                            placeholder="8 (xxx) xxx-xx-xx" value="" autocomplete="tel">
                                    </div>
                                    <div class="form__field__add">
                                        <label for="reg-password">Пароль</label>
                                        <input id="password" type="password" name="password" value="" autocomplete="new-password">
                                    </div>
                                    <div class="form__field__add">
                                        <label for="reg-password_confirmation">Подтвердите пароль</label>
                                        <input id="reg-password_confirmationd" type="password" name="password_confirmation" autocomplete="new-password">
                                    </div>

                                    <button type="submit">Зарегистрироваться</button>
                                </div>
                            </form>
                        </section>

                        <section>
                            <form method="post" class="ajax-form" action="{{ route('recovery.user') }}">
                                @csrf
                                <div class="pass__reset">
                                    <div class="user__b__subtitle">Введите ваш email, новый пароль придёт в письме вам
                                        на почту</div>
                                    <div class="form__field__add">
                                        <label for="password-reset">Email</label>
                                        <input id="password-reset" type="text" name="remail" autocomplete="email">
                                    </div>
                                    <div class="errors">
                                    </div>
                                    <button type="submit">Восстановить</button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
