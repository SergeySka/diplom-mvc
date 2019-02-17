<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Диплом</title>
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<section class="center">
    <?php if (!isset($_SESSION['user_id'])) { ?>
        <a href="index.php?action=admin">Войти</a>
    <?php } ?>
    <?php if (isset($_SESSION['user_id'])) { ?>
        <p>Привет, <?php echo $_SESSION['user_id']; ?>!<a href="index.php?logout=true"> Выйти</a></p>
        <ul class="menu clearfix">
            <li><a href="index.php?action=main">Основная страница</a></li>
            <li><a href="index.php?action=admin&controller=questions">Управление</a></li>
            <li><a href="index.php?action=admin&controller=admins">Управление администраторами</a></li>
        </ul>
    <?php } ?>

</section>
</body>
</html>
<html>
<body>

</body>
</html>