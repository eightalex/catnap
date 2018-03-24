<section class="gallery">
    <?php foreach ($items as $item) : ?>
        <?php $this->renderBlock('gallery__item', [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price
        ]); ?>
    <?php endforeach; ?>


    <?php for ($i = 15; $i--;) : ?>
        <?php $this->renderBlock('gallery__item', [
                'id' => $i,
                'name' => 'Чудесное белье',
                'price' => '500'
        ]); ?>
    <?php endfor; ?>
</section>