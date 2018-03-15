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
    <?= \Core\Controller::include_block('header'); ?>
    <?= \Core\Controller::include_block('main-menu'); ?>
    <?= \Core\Controller::include_block('page-title'); ?>
    <?= \Core\Controller::include_block('page-description'); ?>
    <?= \Core\Controller::include_block('gallery'); ?>
    <?= \Core\Controller::include_block('footer'); ?>
</body>
</html>