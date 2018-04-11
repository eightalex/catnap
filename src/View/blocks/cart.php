<ul class="cart">
    <?php

    $order = json_decode($_COOKIE['order']);

    foreach($order as $key => $amount) {

        // TODO добавить ограничение количества
        $this->getItem($item_id);

        $item_id = substr($key, -1);
        $this->renderBlock('cart__item', [
                'id' => $item_id,
            'amount' => $amount,
             'title' => 'SoundSleep Flora Della Vita',
             'price' => 600,
           'summary' => 600
        ]);
    }

    ?>
    <li class="cart__row cart__row_jc_fe">
        <div class="cart__col">
            Всего:
        </div>
        <div class="cart__col">
            <var class="cart__total">
                <span class="js-cart__total">1800</span>грн
            </var>
        </div>
    </li>
    <li class="cart__row cart__row_jc_c">
        <button class="btn btn_accent">Оформить заказ</button>
    </li>
</ul>