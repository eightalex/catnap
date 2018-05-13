<?php $this->renderBlock('head', [
    'title' => 'Cart — Yousleep',
    'styles' => [
        '/css/cart.css',
        '/css/amount-switcher.css',
        '/css/btn.css',
        '/css/page-title.css',
        '/css/checkout.css',
        '/css/container.css',
        '/css/form.css',
        '/css/input.css',
        '/css/select.css',
        '/css/label.css'
    ]
]); ?>
<?php $this->renderBlock('header'); ?>
<?php $this->renderBlock('main-menu'); ?>
<?php $this->renderBlock('checkout', ['order' => $order]); ?>
<?php $this->renderBlock('footer'); ?>
<?php $this->renderBlock('bottom', [
    'scripts' => [
        '/js/order.js',
        '/js/cart.js',
        '/js/amount-switcher.js'
    ]
]); ?>