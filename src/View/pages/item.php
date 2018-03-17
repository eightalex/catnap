<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Yousleep</title>

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/gallery.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/page.css">
    <link rel="stylesheet" href="/css/main-menu.css">
    <link rel="stylesheet" href="/css/page-description.css">
    <link rel="stylesheet" href="/css/page-title.css">
</head>
<body class="page">
    <?php

    $uri = $_SERVER['REQUEST_URI'];

    var_dump($uri);

    ?>
    <?php $this->renderBlock('header'); ?>
    <?php $this->renderBlock('main-menu'); ?>
    <?php $this->renderBlock('page-title', ['title' => 'Item']); ?>
    <?php $this->renderBlock('page-description', ['text' => 'Замечательный Item']); ?>
    <?php $this->renderBlock('footer'); ?>
</body>
</html>