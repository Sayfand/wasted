<?php
require_once 'db_conn.php';
$id = $_GET['id'];
// Обращение к БД с выборкой подходящего id полученного методом GET
$user = mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = '$id'");
$user = mysqli_fetch_assoc($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Изменение данных</title>
    <link rel="stylesheet" href= "style.css">
</head>
<body class="home">
    <!-- Изменение данных методом POST -->
<form action="Update.php" method="post">
<input type="hidden" name="id" value="<?=$user ['id'] ?>" required>
<p>Имя</p>
<input type="text" name="name" value="<?=$user ['name'] ?>"required>
<p>Телефон</p>
<input type="text" name="phone" value="<?=$user ['phone'] ?>"required>
<p>Почта</p>
<input type="email" name="email" value="<?=$user ['email'] ?>"required>
<p>Пароль</p>
<input type="text" name="pass" value="<?=$user ['pass'] ?>"required>
<button type="submit">Обновить</button>

</form>
</body>
</html>