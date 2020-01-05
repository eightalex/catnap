<?php $this->renderBlock('head', [
    'title' => 'Cart — Yousleep',
    'styles' => [
        '/css/breadcrumbs.css',
        '/css/libs/auto-complete.css',
        '/css/cart.css',
        '/css/cart-item.css',
        '/css/amount-switcher.css',
        '/css/btn.css',
        '/css/page-title.css',
        '/css/checkout.css',
        '/css/checkout-form.css',
        '/css/container.css',
        '/css/table.css',
        '/css/form.css',
        '/css/input.css',
        '/css/select.css',
        '/css/label.css'
    ]
]); ?>
<?php $this->renderBlock('header'); ?>
<?php $this->renderBlock('main-menu'); ?>
<?php $this->renderBlock('breadcrumbs', ['path' => $path]); ?>
<?php $this->renderBlock('checkout'); ?>
<?php $this->renderBlock('footer'); ?>
<?php $this->renderBlock('bottom', [
    'scripts' => [
        '/js/libs/auto-complete.min.js',
        '/js/np.js',
    ]
]); ?>