<li class="cart__item js-cart__item">
    <figure class="cart__img">
        <img src="/img/item/<?= $id ?>/cover.jpg" alt="img">
    </figure>

    <div style="margin-left: 20px; max-width: 355px;">
        <a href="/item/<?= $id ?>" class="cart__title js-cart__title"><?= $title ?></a>
        <p class="cart__description">Полуторный комплект: 2 наволочки 50х70 и 70х70см</p>
        <var class="cart__summary">
            <span class="js-cart__summary"><?= $summary ?></span> грн
        </var>
    </div>

    <div style="margin-left: auto; margin-right: 20px; align-self: center;">
        <?php $this->renderBlock('amount-switcher', ['id' => $id, 'amount' => $amount]) ?>
        <var class="cart__price">
            1шт = <span class="js-cart__price"><?= $price ?></span> грн
        </var>
    </div>

    <button class="cart__remove js-cart__remove" data-id="<?= $id ?>"></button>
</li>