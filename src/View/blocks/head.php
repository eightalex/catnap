<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="/css/libs/normalize.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/main-menu.css">
    <link rel="stylesheet" href="/css/cart-counter.css">
    <link rel="stylesheet" href="/css/page.css">
    <link rel="stylesheet" href="/css/footer.css">

    <?php if (isset($styles)) $this->renderStyles($styles); ?>
</head>
<body class="page">
<main id="app">