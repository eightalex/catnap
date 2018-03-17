<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">

    <?php foreach ($styles as $style) : ?>
        <link rel="stylesheet" href="<?= $style; ?>">
    <?php endforeach; ?>
</head>
<body class="page">