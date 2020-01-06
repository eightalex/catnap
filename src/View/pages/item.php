<?php $this->renderBlock('head', ['title' => 'Catnap']); ?>
<?php $this->renderBlock('header'); ?>
<?php $this->renderBlock('main-menu'); ?>
<?php $this->renderBlock('breadcrumbs', ['path' => $path]); ?>
<?php $this->renderBlock('item', ['item' => $item]); ?>
<?php $this->renderBlock('footer'); ?>
<?php $this->renderBlock('notify'); ?>
<?php $this->renderBlock('bottom', [
    'scripts' => [
        '/js/notify.js',
        '/js/item.js',
        '/js/btn.js'
    ]
]); ?>