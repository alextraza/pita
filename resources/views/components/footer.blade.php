{{-- @if (request()->cookie('cookies')) --}}
<div class="cookieform">
    Мы используем cookies. Продолжая пользоваться сайтом, вы принимаете <a href="/privacy-policy">условия обработки персональных данных</a> <button onclick="cookie">х</button>
  
</div>
  {{-- @endif --}}
<footer class="footer @if (Cart::count())bottom-marged @endif">
    <div class="logo">
        Pita pizza
    </div>
    <div class="phone">
        Телефон:
        <a
            href="tel:{{ str_replace([' ', '(', ')', '-'], '', \App\Models\Config::phone()) }}">{{ \App\Models\Config::phone() }}</a>
    </div>
</footer>
<div id="dialog" class="modal @if (Session::get('success')) active @endif">
    <div class="modal__overlay">
    </div>
    <div class="modal__window">
        <div class="modal__close">&times;</div>
        <div class="modal__inner">
            @if (Session::get('success')) {{ Session::get('success') }} @endif
        </div>
    </div>
</div>
