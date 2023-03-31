<?php
require_once 'db.php';
if(isset($_POST['Autor']))
{
    $login = $_POST["login"];
    $pass = $_POST["pass"];
        if(empty($login) || empty($pass))
        {
            echo "Вы не указали логин и/или пароль!";
        }
        else
        {
            $sql = "select * from users;";
            $result = $conn->query($sql);
            $flag = false;
            foreach($result as $row)
            {
                if($row["login"] == $login && $row["password"] == $pass)
                    $flag = true;
            }
            if($flag){
                header('Location: script.php');
            }
            else
                echo "Неверный логин и/или пароль!";
        }
    }
    if(isset($_POST['Guest'])){
        header('Location: guest.php');
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Авторизация</title>
</head>
<body>
    <style>
        .btn
        {
            margin-top: 10px;
            margin-left: 10px;
        }
    </style>
    <form action="#" method="post">
        <h2> Авторизация </h2>
        <input type="text" name="login" placeholder="Логин" class="btn">
        <br>
        <input type="text" name="pass" placeholder="Пароль" class="btn">
        <br>
        <input type="submit" value = "Войти" name = "Autor" class="btn">
        <input type="submit" value = "Войти как гость" name = "Guest" class="btn">
    </form>
</body>
</html>
