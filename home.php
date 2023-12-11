<?php
require_once 'db_conn.php';
session_start();
$id= $_SESSION['id'];
// Выборка записей из БД с присвоенным сессией id 
$duser = mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = '$id'");
$duser = mysqli_fetch_assoc($duser);
if (isset($_SESSION['id']) && isset ($_SESSION['phone'])  ) {
    ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Дом</title>
    <link rel="stylesheet" href= "style.css">
  </head>
  <body>
    <form action="logout.php">
        <button type="submit">Выход</button>
    </form>
    <h1> Привет, <?=$duser ['name'] ?> </h1> 
    <h1> Ваш телефон: <?=$duser ['phone'] ?> </h1>
    <h1> Ваша почта: <?=$duser ['email'] ?> </h1>
    <h1> Ваш пароль: <?=$duser ['pass'] ?> </h1>
    <h1> Ваше имя пользователя: <?=$duser ['uname'] ?> </h1>
    <h1> Ваш id: <?=$duser ['id'] ?> </h1>
    <!-- Изменение данных с сохранением сессионного id методом get -->
    <h3> Хотите изменить данные? </h3> 
    <div>
     <form id="edit" action="edit.php" method="get">
    <input type="hidden" name="id" value="<?=$_SESSION['id'] ?>">
    <button type="submit">Изменить данные</button>
    </form> 
    </div>
  </body>
  </html>
      <?php
}
else {
    header("Location: index.php");
    exit();
}
?>
