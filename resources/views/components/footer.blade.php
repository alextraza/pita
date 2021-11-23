<footer class="footer" id="test-2">
    <div class="logo">
        Pita pizza
    </div>
    <div class="phone">
        Телефон:
        <a href="tel:{{ str_replace([' ', '(', ')', '-'], '', \App\Models\Config::phone()) }}">{{ \App\Models\Config::phone() }}</a>
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
