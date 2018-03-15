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
    <?= $this->include_block('header'); ?>
    <?= $this->include_block('main-menu'); ?>
    <?= $this->include_block('page-title', 'Постельное белье'); ?>
    <?= $this->include_block('page-description',
        'Здесь, в магазине Usleep, белье — одно из наших любимых волокон. Как и просто супер
        шить, льняная ткань имеет прекрасное земное ощущение, начиная с хрустящей корочки, но со временем смягчается с
        мытьем и износом.'); ?>
    <?= $this->include_block('gallery'); ?>
    <?= $this->include_block('footer'); ?>
</body>
</html>