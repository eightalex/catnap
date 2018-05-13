<li class="cart__item js-cart__item">
    <div class="cart__col">
        <figure class="cart__img">
            <img src="/img/gallery/<?= $id ?>.jpg" alt="img">
        </figure>
    </div>
    <div class="cart__col cart__col_miw_237 cart__col_maw_m">
        <a href="/item/<?= $id ?>" class="cart__title js-cart__title"><?= $title ?></a>
        <p class="cart__description">Полуторный комплект<br>2 наволочки: 50х70, 70х70см</p>
    </div>
    <div class="cart__col cart__col_as_c cart__col_ml_a">
        <?php $this->renderBlock('amount-switcher', ['id' => $id, 'amount' => $amount]) ?>
        <var class="cart__price">
            1шт = <span class="js-cart__price"><?= $price ?></span>грн
        </var>
    </div>
    <div class="cart__col cart__col_as_c cart__col_ml_a">
        <var class="cart__summary">
            <span class="js-cart__summary"><?= $summary ?></span>грн
        </var>
    </div>
    <button class="cart__remove js-cart__remove" data-id="<?= $id ?>"></button>
</li>