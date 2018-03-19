<li class="cart__item">
    <div class="cart__col">
        <figure class="cart__img">
            <img src="/img/gallery/<?= $img ?>.jpg" alt="img">
        </figure>
    </div>
    <div class="cart__col">
        <div class="cart__controls">
            <a href="/item/1" class="cart__title">Комплект замечательного белья</a>
            <var class="cart__price">1000грн</var>
        </div>
    </div>
    <div class="cart__col cart__col_as_c" style="margin-left: auto;">
        <?php $this->renderBlock('amount-switcher', ['mix' => 'cart__amount-switcher']) ?>
    </div>
    <div class="cart__col cart__col_as_c cart__col_ml_a">
        <var class="cart__summary">2000грн</var>
    </div>
</li>