<html>
<body>
<h3>Текущие администраторы</h3>
<table>
    <thead>
    <th>Логин</th>
    <th>Пароль</th>
    <th>Изменить пароль</th>
    <th>Удалить</th>
    </thead>
    <?php foreach ($users as $users_value) : ?>
        <tr>
            <td><?= $users_value['login'] ?></td>
            <td><?= $users_value['password'] ?></td>
            <td>
                <form action="" method="POST">
                    <input name="user_id" type="hidden" value="<?= $users_value['id'] ?>">
                    <input name="user_change_password" type="text" placeholder="введите новый пароль">
                    <input type="submit" value="Изменить пароль">
                </form>
            </td>
            <td><a href="index.php?del=true&id=<?= $users_value['id'] ?>">удалить</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>