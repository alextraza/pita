<div id="userModal" class="modal">
    <div class="modal__overlay">
    </div>
    <div class="modal__window">
        <div class="modal__close">&times;</div>
        <div class="modal__inner">
            <div class="delivery__sec first">
                <div class="delivery__heading">
                    <div class="title">Личный кабинет</div>
                </div>
                <div class="tabset">
                    <input type="radio" class="input__tab" name="delivery" value="myself" id="tabset_login" hidden
                           aria-hidden="true" @if (!old('delivery') || old('delivery') == 'myself') checked @endif>
                    <input type="radio" class="input__tab" name="delivery" value="delivery" id="tabset_register"
                           hidden {{ old('delivery') == 'delivery' ? 'checked' : '' }} aria-hidden="true">
                    <input type="radio" class="input__tab" name="forgot_password" value="forgot_password"
                           id="tabset_password" hidden {{ old('delivery') == 'delivery' ? 'checked' : '' }}
                           aria-hidden="true">
                    <ul hidden aria-hidden="true">
                        <li><label for="tabset_login">Войти</label></li>
                        <li><label for="tabset_register">Регистрация</label></li>
                        <li><label for="tabset_password">Забыл пароль</label></li>
                    </ul>
                    <div>
                        <section>
                            <form method="post" class="ajax-form" action="{{ route('login.user') }}">
                                @csrf
                                <div class="form__group__add ">
                                    <div class="form__field__add">
                                        <label for="phone">Телефон</label>
                                        <input id="phone" type="phone" data-js="input" name="phone"
                                               placeholder="8 (xxx) xxx-xx-xx">
                                    </div>
                                    <div class="form__field__add">
                                        <label for="password">Пароль</label>
                                        <input id="password" type="password" name="password">
                                    </div>
                                    <div class="form__field__add bg_unset">
                                        {{-- <label for="forgot_password">Забыли пароль</label> --}}
                                       
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
                                        <label for="email">Email*</label>
                                        <input id="email" type="text" name="email">
                                    </div>
                                    <div class="form__field__add">
                                        <label for="phone">Телефон*</label>
                                        <input id="phone" type="text" data-js="input" name="phone"
                                               placeholder="8 (xxx) xxx-xx-xx" value="  ">
                                    </div>
                                    <div class="form__field__add">
                                        <label for="password">Пароль</label>
                                        <input id="password" type="password" name="password" value="">
                                    </div>
                                    <div class="form__field__add">
                                        <label for="password">Подтвердите пароль</label>
                                        <input id="password" type="password" name="password_confirmation">
                                    </div>
                                    <button type="submit">Зарегистрироваться</button>
                                </div>
                        </section>
                        <section>

                            <form method="post" class="ajax-form">
                                @csrf
                                <div class="pass__reset">
                                    <div class="form__field__add">

                                        <label for="password-reset">Email</label>
                                        <input id="password-reset" type="text" name="email">

                                    </div>
                                    <button type="submit">Войти</button>
                                </div>
                                <div class="message-container"></div>
                            </form>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
