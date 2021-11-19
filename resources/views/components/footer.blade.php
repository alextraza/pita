<footer class="footer" id="test-2">
    <div class="logo">
        Pita pizza
    </div>
    <div class="phone">
        Телефон:
        <a href="tel:{{ str_replace([' ', '(', ')', '-'], '', \App\Models\Config::phone()) }}">{{ \App\Models\Config::phone() }}</a>
    </div>
</footer>
