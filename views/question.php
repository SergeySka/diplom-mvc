<html>
<body>
<section class="center">

    <div class="new_question">
        <h3>Задать вопрос</h3>
        <form action="" method="POST">
            <div class="inline">
                <div><input type="email" name="user_mail" id="user_mail" placeholder="Введите свой e-mail" required>
                </div>
                <div><input type="text" name="user_name" id="user_name" placeholder="Введите свое имя" required></div>
            </div>
            <div class="">
                <textarea name="user_question" id="user_question" rows="3" style="width: 439px" required
                          placeholder="Введите свой вопрос"></textarea>
            </div>
            <div class="last_line clearfix">
                <div class="left">
                    <label for="user_category">Выберите категорию </label>
                    <select name="user_category" id="user_category">
                        <?php foreach ($category as $row) : ?>
                            <option value="<?= $row['id'] ?>"><?= $row['category'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="right">
                    <input type="submit" value="Отправить">
                </div>
            </div>
        </form>
    </div>

    <div class="forum">
        <?php foreach ($category as $row) { ?>
            <h2><?= $row['category'] ?></h2>
            <?php foreach ($table as $value) { ?>
                <?php if (($row['id'] == $value['category_id']) && ($value['is_hidden'] == 1)) : ?>
                    <input class="hide question" id="<?= $value['id'] ?>" type="checkbox">
                    <label for="<?= $value['id'] ?>"><?= $value['question'] ?></label>
                    <div><?= $value['answer'] ?></div>
                    <br>
                <?php endif ?>
            <?php } ?>
        <?php } ?>
    </div>
</section>
</html>
</body>
