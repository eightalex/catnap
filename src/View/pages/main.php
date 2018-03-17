<?php $this->renderBlock('head', [
    'title' => 'Yousleep',
    'styles' => [
        '/css/gallery.css',
        '/css/page.css',
        '/css/main-menu.css',
        '/css/page-description.css',
        '/css/page-title.css',
    ]
]); ?>
<?php $this->renderBlock('header'); ?>
<?php $this->renderBlock('main-menu'); ?>
<?php $this->renderBlock('page-title', ['title' => $mainPage->title]); ?>
<?php $this->renderBlock('page-description', ['text' => $mainPage->description]); ?>
<?php $this->renderBlock('gallery'); ?>
<?php $this->renderBlock('footer'); ?>
<?php $this->renderBlock('bottom'); ?>