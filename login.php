<?php
session_start();
include_once "db_conn.php";
// проверка токена
define('SMARTCAPTCHA_SERVER_KEY', 'ysc2_y6K0bQawpHzc9KTurOPMxwfHAA0wQQcl2AWlSdbx032465e0');

function check_captcha($token) {
    $ch = curl_init();
    $args = http_build_query([
        "secret" => SMARTCAPTCHA_SERVER_KEY,
        "token" => $token,
        
    ]);
    curl_setopt($ch, CURLOPT_URL, "https://smartcaptcha.yandexcloud.net/validate?$args");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);

    $server_output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode !== 200) {
        echo "Allow access due to an error: code=$httpcode; message=$server_output\n";
        return true;
    }
    $resp = json_decode($server_output);
    return $resp->status === "ok";
}

$token = $_POST['smart-token'];
if (check_captcha($token)) {
    echo "Passed\n";
    echo "Robot\n";
}

// Определение инициализации
if (isset($_POST['phone']) && isset($_POST['pass'])) {
    function validate($data) {
        $data = trim($data);
        $data  = stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;
    }
}
$id = $_POST['id'];
$uname = $_POST['phone'];
$pass = $_POST['pass'];

// Стандартная проверка ошибок
if(empty ($uname) || empty($pass)) {
    header("Location: index.php?error=Заполните все поля");
    exit();
}
if(empty($token) || empty ($uname) || empty($pass)) {
    header("Location: index.php?error=Заполните все поля и решите капчу");
    exit();

        header("Location: index.php?error=Заполните капчу");
        exit();
}
if(empty($uname)) {
    header("Location: index.php?error=Имя пользователя не заполнено");
    exit();
}
else if(empty($pass)) {
    header("Location: index.php?error=Пароль не заполнен");
    exit();
}
// Выборка данных и присвоение
$sql = "SELECT * FROM users WHERE `phone` = '$uname' AND `pass` = '$pass'";

$result = mysqli_query($conn, $sql);
//Проверка и присвоение к переменной Session


if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($token = $_POST['smart-token']) {

        if($row['phone'] === $uname && $row['pass'] === $pass ) {
            echo "Logged IN!";
            $_SESSION ['phone'] = $row ['phone'];
            $_SESSION ['name'] = $row ['name'];
            $_SESSION ['id'] = $row ['id'];
            $_SESSION ['uname'] = $row ['uname'];
            $_SESSION ['pass'] = $row ['pass'];
            $_SESSION ['email'] = $row ['email'];
            header ("Location: home.php");
            exit();
            
        } 
    }
    }
    
    


?>