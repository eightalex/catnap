<?php $this->renderBlock('head', [
    'title' => 'Yousleep',
    'styles' => [
        '/css/btn.css',
        '/css/item.css',
        '/css/notify.css'
    ]
]); ?>
<?php $this->renderBlock('header'); ?>
<?php $this->renderBlock('main-menu'); ?>
<?php $this->renderBlock('item', ['item' => $item]); ?>
<?php $this->renderBlock('footer'); ?>
<?php $this->renderBlock('notify'); ?>
<?php $this->renderBlock('bottom', [
    'scripts' => [
        '/js/notify.js',
        '/js/item.js'
    ]
]); ?>