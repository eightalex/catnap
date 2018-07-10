<section class="gallery">
    <?php foreach ($items as $item) : ?>
        <?php $this->renderBlock('gallery__item', [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price
        ]); ?>
    <?php endforeach; ?>
</section>