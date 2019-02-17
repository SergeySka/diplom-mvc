<html>
<body>
<section class="center describe_category">
    <table>
        <thead>
        <th>Вопросы</th>
        <th>Ответы</th>
        <th>Автор</th>
        <th>Дата создания</th>
        <th>Статус</th>
        <th>Скрыть</th>
        <th>Переместить</th>
        <th>Редактировать</th>
        <th>Удалить</th>
        </thead>
        <?php foreach ($showCategory as $categoryValue) { ?>
            <tr>
                <td>
                    <form action="" method="POST" id="form<?= $categoryValue['id'] ?>">
                                <textarea name="update_question"
                                          form="form<?= $categoryValue['id'] ?>"><?= $categoryValue['question'] ?></textarea>
                    </form>
                </td>
                <td>
                    <form action="" method="POST" id="form<?= $categoryValue['id'] ?>">
                                <textarea name="update_answer"
                                          form="form<?= $categoryValue['id'] ?>"><?= $categoryValue['answer'] ?></textarea>
                    </form>
                </td>
                <td>
                    <form action="" method="POST" id="form<?= $categoryValue['id'] ?>">
                        <input type="hidden" name="id" form="form<?= $categoryValue['id'] ?>"
                               value="<?= $categoryValue['id'] ?>">
                        <input type="text" name="update_author" form="form<?= $categoryValue['id'] ?>"
                               value="<?= $categoryValue['author'] ?>">
                    </form>
                </td>
                <td class="date_added">
                    <?= $categoryValue['date_added'] ?>
                </td>
                <td>
                    <?php if (empty($categoryValue['answer'])) {
                        echo "Ожидает ответ";
                    } else {
                        if ($categoryValue['is_hidden'] == 1) {
                            echo "Опубликовано";
                        } else {
                            echo "Скрыто";
                        }
                    }
                    ?>
                </td>
                <td>
                    <a href="index.php?action=admin&controller=questions&show=<?= $categoryValue['is_hidden'] ?>&main_id=<?= $categoryValue['id'] ?>">Скрыть/Показать</a>
                </td>
                <td>
                    <form action="" method="POST" id="form<?= $categoryValue['id'] ?>">
                        <select name="update_theme" form="form<?= $categoryValue['id'] ?>">
                            <?php foreach ($category as $category_select) { ?>
                                <option value="<?= $category_select['id'] ?>" <?php if ($category_select['id'] == $categoryValue['category_id']): ?> selected <?php endif ?> >
                                    <?= $category_select['category'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </form>
                </td>
                <td>
                    <form action="" method="POST" id="form<?= $categoryValue['id'] ?>">
                        <input type="submit" form="form<?= $categoryValue['id'] ?>" value="Редактировать">
                    </form>
                </td>
                <td><a href="index.php?action=admin&controller=questions&del=true&main_id=<?= $categoryValue['id'] ?>">Удалить</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>
</html>
</body>