<html>
<body>
<section class="center describe_questions">
    <table>
        <thead>
        <th>Текущие темы</th>
        <th>Вопросов в теме</th>
        <th>Опубликовано</th>
        <th>Без ответа</th>
        <th>Удалить</th>
        </thead>
        <?php foreach ($category as $row) { ?>
            <tr>
                <td>
                    <a href="index.php?action=admin&controller=questions&show=true&category_id=<?= $row['id'] ?>"><?= $row['category'] ?></a>
                </td>
                <td>
                    <?php $i = 0;
                    foreach ($describeCategory as $describeCategory_value) {
                        if ($describeCategory_value['category'] == $row['category']) {
                            $i++;
                        }
                    }
                    echo $i; ?>
                </td>
                <td>
                    <?php $i = 0;
                    foreach ($describeCategory as $describeCategory_value) {
                        if ($describeCategory_value['category'] == $row['category']) {
                            if ($describeCategory_value['is_hidden'] == 1) {
                                $i++;
                            }
                        }
                    }
                    echo $i; ?>
                </td>
                <td>
                    <?php $i = 0;
                    foreach ($describeCategory as $describeCategory_value) {
                        if ($describeCategory_value['category'] == $row['category']) {
                            if (empty($describeCategory_value['answer'])) {
                                $i++;
                            }
                        }
                    }
                    echo $i; ?>
                </td>
                <td>
                    <a href="index.php?action=admin&controller=questions&del=true&category_id=<?= $row['id'] ?>">удалить</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>
</body>
</html>