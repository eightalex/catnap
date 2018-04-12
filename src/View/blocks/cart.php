<ul class="cart">
    <?php

    $total = 0;

    foreach($order as $item) {
        // TODO добавить ограничение количества
        $summary = $item['price'] * $item['amount'];

        $this->renderBlock('cart__item', [
                'id' => $item['id'],
            'amount' => $item['amount'],
             'title' => $item['title'],
             'price' => $item['price'],
           'summary' => $summary
        ]);

        $total += $summary;
    }

    ?>
    <li class="cart__row cart__row_jc_fe">
        <div class="cart__col">
            Всего:
        </div>
        <div class="cart__col">
            <var class="cart__total">
                <span class="js-cart__total"><?= $total ?></span>грн
            </var>
        </div>
    </li>
    <li class="cart__row cart__row_jc_c">
        <button class="btn btn_accent">Оформить заказ</button>
    </li>
</ul>