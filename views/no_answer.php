<html>
<head>
    <table>
        <thead>
        <th>Вопрос</th>
        <th>Ответ</th>
        <th>Автор</th>
        <th>Дата создания</th>
        <th>Переместить</th>
        <th>С публикацией</th>
        <th>Редактировать</th>
        <th>Удалить</th>
        </thead>
        <?php foreach ($table_no_answer as $no_answer) { ?>
            <tr>
                <td>
                    <form action="" method="POST" id="form_question_<?= $no_answer['id'] ?>">
                            <textarea name="update_question"
                                      form="form_question_<?= $no_answer['id'] ?>"><?= $no_answer['question'] ?></textarea>
                    </form>
                </td>
                <td>
                    <form action="" method="POST" id="form_question_<?= $no_answer['id'] ?>">
                            <textarea name="update_answer"
                                      form="form_question_<?= $no_answer['id'] ?>"><?= $no_answer['answer'] ?></textarea>
                    </form>
                </td>
                <td>
                    <form action="" method="POST" id="form_question_<?= $no_answer['id'] ?>">
                        <input type="hidden" name="id" form="form_question_<?= $no_answer['id'] ?>"
                               value="<?= $no_answer['id'] ?>">
                        <input type="text" name="update_author" form="form_question_<?= $no_answer['id'] ?>"
                               value="<?= $no_answer['author'] ?>">
                    </form>
                </td>
                <td>
                    <?= $no_answer['date_added'] ?>
                </td>
                <td>
                    <form action="" method="POST" id="form_question_<?= $no_answer['id'] ?>">
                        <select name="update_theme" form="form_question_<?= $no_answer['id'] ?>">
                            <?php foreach ($category as $category_select) { ?>
                                <option value="<?= $category_select['id'] ?>" <?php if ($category_select['id'] == $no_answer['category_id']): ?> selected <?php endif ?> >
                                    <?= $category_select['category'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </form>
                </td>
                <td>
                    <form action="" method="POST" id="form_question_<?= $no_answer['id'] ?>">
                        <input type="checkbox" name="show" form="form_question_<?= $no_answer['id'] ?>"
                               id="show<?= $no_answer['id'] ?>" <?php if ($no_answer['is_hidden'] == 1) : ?> checked <?php endif ?>><label
                                for="show<?= $no_answer['id'] ?>">Публиковать</label>
                    </form>
                </td>
                <td>
                    <form action="" method="POST" id="form_question_<?= $no_answer['id'] ?>">
                        <input type="submit" form="form_question_<?= $no_answer['id'] ?>" value="Редактировать">
                    </form>
                </td>
                <td><a href="index.php?del=true&main_id=<?= $no_answer['id'] ?>">Удалить</a></td>
            </tr>
        <?php } ?>
    </table>
</html>
</head>