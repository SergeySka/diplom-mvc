<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php foreach ($category as $row) { ?>
    <h2><?= $row['category'] ?></h2>
    <?php foreach ($table as $value) { ?>
        <?php if (($row['id'] == $value['category_id']) && ($value['is_hidden'] == 1)) : ?>
            <input class="hide" id="<?= $value['id'] ?>" type="checkbox">
            <label for="<?= $value['id'] ?>"><?= $value['question'] ?></label>
            <div>Здесь будет ответ</div>
            <br>
        <?php endif ?>
    <?php } ?>
<?php } ?>
</body>

</body>
</html>