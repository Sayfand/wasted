<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Подключение капчи -->
<script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
   
<title>Логин</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="home">
        <!-- Форма авторизации -->
    <form action="login.php" method="post">
        <h2>Вход</h2>
        <label>Логин</label>
        <input type="text" name="phone" placeholder="Введите телефон"> <br>
        <label>Пароль</label>
        <input type="password" name="pass" placeholder="Введите пароль"> <br>
        
        <!-- Контейнера для капчи -->
        <div 
        id="captcha-container"
        class="smart-captcha"
        data-sitekey="ysc1_y6K0bQawpHzc9KTurOPMTPujLdkTYwEVUDIaPmxh1c871d5c"
        >
        <input type="hidden" name="smart-token" value="token">
    </div>
    
    <button type="submit" value="Войти">Войти</button>
    <p>
        Еще нет аккаунта? - <a href="reg.php">Регистрация</a>
    </p>
    
    
</form>
<!-- Ссылка на регистрацию -->
<?php if(isset($_GET['error']))  ?>
<p class="error"> <?php echo $_GET ['error']; ?> </p>

</body>
</html>