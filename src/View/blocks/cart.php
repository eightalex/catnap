<ul class="cart">
    <?php for ($i = 3; $i--;) : ?>
        <?php $this->renderBlock('cart__item', ['id' => $i]) ?>
    <?php endfor; ?>
</ul>