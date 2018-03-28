<?php $this->renderBlock('head', [
    'title' => 'Yousleep',
    'styles' => [
        '/css/btn.css',
        '/css/item.css'
    ]
]); ?>
<?php $this->renderBlock('header'); ?>
<?php $this->renderBlock('main-menu'); ?>
<?php $this->renderBlock('item', ['item' => $item]); ?>
<?php $this->renderBlock('footer'); ?>
<?php $this->renderBlock('bottom'); ?>