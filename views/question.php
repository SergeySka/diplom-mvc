<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<h3>Вопросы</h3>
<form action="" method="POST">
    <p><label for="user_question">Введите свой вопрос </label><input type="text" name="user_question"
                                                                     id="user_question" required></p>
    <label for="user_category">Выберите категорию </label>
    <select name="user_category" id="user_category">
        <?php foreach ($category as $row) : ?>
            <option value="<?= $row['id'] ?>"><?= $row['category'] ?></option>
        <?php endforeach; ?>
    </select>
    <p><label for="user_mail">Введите свой e-mail </label><input type="email" name="user_mail" id="user_mail"
                                                                 required></p>
    <p><label for="user_name">Введите свое имя </label><input type="text" name="user_name" id="user_name" required>
    </p>
    <p><input type="submit" value="Отправить"></p>
</form>

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
</html>
</body>
