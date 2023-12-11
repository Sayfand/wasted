<!DOCTYPE html>
<html lang="en">
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="home">
    <!-- Форма регистрации -->
    <form action="register.php" method="post">
        <h2>Регистрация</h2>
        <label>Имя пользователя</label>
        <input type="text" name="uname" placeholder="Введите уникальное имя пользователя" required> <br>
        <label>Имя</label>
        <input type="text" name="name" placeholder="Введите имя" required> <br>
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите почту" required> <br>
        <label>Телефон</label>
        <input type="text" name="phone" placeholder="Введите телефон" required> <br>
        <label>Пароль</label>
        <input type="password" name="pass" placeholder="Введите пароль" required> <br>
        <label>Повторите пароль</label>
        <input type="password" name="repeat_password" placeholder="Введите пароль еще раз" required> <br>
        
        <button type="submit">Регистрация</button>

        <p>
            <!-- Ссылка на авторизацию -->
        Уже зарегестрированы? - <a href="index.php">Войти</a>
    </p>
        