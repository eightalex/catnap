<?php $this->renderBlock('head', ['title' => 'Cart — Catnap']); ?>
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