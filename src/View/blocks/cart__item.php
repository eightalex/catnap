<li class="cart__item js-cart__item">
    <div class="cart__col">
        <figure class="cart__img">
            <img src="/img/gallery/<?= $id ?>.jpg" alt="img">
        </figure>
    </div>
    <div class="cart__col cart__col_maw_m">
        <a href="/item/<?= $id ?>" class="cart__title">SoundSleep Flora Della Vita</a>
        <p class="cart__description">Полуторный комплект<br>2 наволочки: 50х70, 70х70см</p>
    </div>
    <div class="cart__col cart__col_as_c cart__col_ml_a">
        <?php $this->renderBlock('amount-switcher') ?>
        <var class="cart__price">
            1шт = <span class="js-cart__price">600</span>грн
        </var>
    </div>
    <div class="cart__col cart__col_as_c cart__col_ml_a">
        <var class="cart__summary">
            <span class="js-cart__summary">600</span>грн
        </var>
    </div>
    <button class="cart__remove js-cart__remove"></button>
</li>