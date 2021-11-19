<div class="item">

    <div class="item__img__block">
        <img src="{{ asset('img/pizza/1.webp') }}" alt="">
        <button class="item__button" type="button" onclick="alert('Hello world!')"><i data-feather="plus"></i></button>
    </div>
    <div class="item__content">

        <div class="card__heading"><span class="card__cat">Пицца</span> Tartufina</div>

        <div class="card__desc">с моцареллой, шампиньонами, пармезаном, трюфельным кремом, свежемолотым черным
            перцем и петрушкой</div>
        <input id="switch" type="checkbox" checked>
        <div class="pizza__size">
            <div class="pizza__item">
                <label for="switch" data-standart="Маленькая" data-big="Большая"></label>
            </div>
        </div>

        <div class="main-var">
            <div class="card__comp">
                <div><span>Вес:</span> 2600 г. Белки:</span> 44 г. <span>Жиры:</span> 49 г. <span>Углеводы:</span> 120 г.
                </div>
                <div><span>Энергетическая ценность:</span> 247 ккал на 100 г</div>
            </div>
            <div class="card__price">4000 ₽</div>
        </div>
        <div class="alt-var">
            <div class="card__comp secondary">
                <div><span>Вес:</span> 410 г. Белки:</span> 44 г. <span>Жиры:</span> 49 г. <span>Углеводы:</span> 120 г.
                </div>
                <div><span>Энергетическая ценность:</span> 1247 ккал на 100 г</div>

            </div>
            <div class="card__price secondary">600 ₽</div>

        </div>
    </div>
</div>
