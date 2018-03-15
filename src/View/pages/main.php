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
    <?php $this->renderBlock('header'); ?>
    <?php $this->renderBlock('main-menu'); ?>
    <?php $this->renderBlock('page-title', ['title' => 'Постельное белье']); ?>
    <?php $this->renderBlock('page-description', ['text' =>
        'Здесь, в магазине Usleep, белье — одно из наших любимых волокон. Как и просто супер
        шить, льняная ткань имеет прекрасное земное ощущение, начиная с хрустящей корочки, но со временем смягчается с
        мытьем и износом.']); ?>
    <?php $this->renderBlock('gallery'); ?>
    <?php $this->renderBlock('footer'); ?>
</body>
</html>