<div class="cart">
    <?php if ($order) : ?>
        <ul class="cart__list js-cart__list">
            <?php

            $total = 0;

            foreach($order as $item) {

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
            <li class="cart__row cart__row_jc_fe"> <!-- TODO Move from list -->
                <div class="cart__col">Всего:</div>
                <div class="cart__col">
                    <var class="cart__total">
                        <span class="js-cart__total"><?= $total ?></span>грн
                    </var>
                </div>
            </li>
        </ul>
    <?php else : ?>
        <div class="cart__placeholder">
            Корзина пустая
        </div>
    <?php endif; ?>
</div>