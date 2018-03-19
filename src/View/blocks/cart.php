<ul class="cart">
    <?php for ($i = 3; $i--;) : ?>
        <?php $this->renderBlock('cart__item', ['img' => $i]) ?>
    <?php endfor; ?>
</ul>