<div class="item">

    <div class="item__img__block">
        <img src="{{ asset('img/pizza/1.webp') }}" alt="">
        <button class="item__button" type="button" onclick="alert('Hello world!')"><i data-feather="plus"></i></button>
    </div>
    <div class="item__content">
      
        <div class="card__heading"><span class="card__cat">Пицца</span> Tartufina</div>
       
        <div class="card__desc">с моцареллой, шампиньонами, пармезаном, трюфельным кремом, свежемолотым черным
            перцем и петрушкой</div>
        <div class="pizza__size">
            <div class="pizza__item">
                <input id="1" type="radio" name="radio" value="Большая" checked>
                <label for="1">Большая</label>
            </div>
            <div class="pizza__item">
                <input id="2" type="radio" name="radio" value="Средняя">
                <label for="2">Средняя</label>
            </div>
        </div>
      
        <div class="card__comp">
            <div><span>Вес:</span> 410 г. Белки:</span> 44 г. <span>Жиры:</span> 49 г. <span>Углеводы:</span> 120 г. </div>
            <div><span>Энергетическая ценность:</span> 247 ккал на 100 г</div>
            
        </div>
        <div class="card__price">600 ₽</div>
      
    </div>
</div>
