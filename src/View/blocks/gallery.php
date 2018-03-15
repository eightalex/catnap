<section class="gallery">
    <?php for ($i = 15; $i--;) : ?>
        <?php $this->renderBlock('gallery__item', ['id' => $i]); ?>
    <?php endfor; ?>
</section>