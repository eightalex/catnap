<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $trimmed_filters = trim($request['REQUEST_URI'], '/'); // trim '/' in start and end of string
        $filter_arr = explode('/', $trimmed_filters); // create filters array
        array_shift($filter_arr); // remove /filter/
        $filters = [];
    ?>
    <?php foreach ($filter_arr as $key => $value) {
        if ($key % 2) {
            $filters['value'][] = $value;
        } else {
            $filters['key'][] = $value;
        }
    } ?>

    <?php for ($i = 0; $i < count($filters['key']); $i++): ?>
    <pre>
        Filter name: <?= $filters['key'][$i]; ?><br>
        Filter value: <?= $filters['value'][$i]; ?><br>
    </pre>
    <?php endfor; ?>
</body>
</html>