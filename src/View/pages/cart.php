<?php $this->renderBlock('head', [
    'title' => 'Cart — Yousleep',
    'styles' => [
        '/css/cart.css',
        '/css/amount-switcher.css',
        '/css/btn.css'
    ]
]); ?>
<?php $this->renderBlock('header'); ?>
<?php $this->renderBlock('main-menu'); ?>
<?php $this->renderBlock('cart', ['order' => $order]); ?>
<?php $this->renderBlock('footer'); ?>
<?php $this->renderBlock('bottom', [
    'scripts' => [
        '/js/order.js',
        '/js/cart.js',
        '/js/amount-switcher.js'
    ]
]); ?>