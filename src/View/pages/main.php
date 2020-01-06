<?php $this->renderBlock('head', ['title' => 'Catnap']); ?>
<?php $this->renderBlock('header'); ?>
<?php $this->renderBlock('main-menu'); ?>
<?php $this->renderBlock('page-title', ['title' => $mainPage->title]); ?>
<?php $this->renderBlock('page-description', ['text' => $mainPage->description]); ?>
<?php $this->renderBlock('gallery', ['items' => $items]); ?>
<?php $this->renderBlock('footer'); ?>
<?php $this->renderBlock('bottom'); ?>