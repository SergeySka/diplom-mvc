<html>
<body>
<h2>Интерфейс администратора</h2>
<?php if (isset($_SESSION['user_id'])) { ?>
    <p>Привет, <?php echo $_SESSION['user_id']; ?>!<a href="index.php?logout=true"> Выйти</a></p>
<?php } ?>
</body>
</html>