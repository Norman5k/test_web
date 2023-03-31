<?php
    require_once 'db.php';
	if(isset($_POST['Reg'])){
        if (empty($_POST['login'])) {
            echo 'Укажите логин';
        } elseif (empty($_POST['pass'])) {
            echo 'Укажите пароль';
        }
        else
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
                $flag = true;
                foreach($result as $row)
                {
                    if($row["login"] == $login)
                        $flag = false;
                }
                if($flag){
                    $sql = "insert into users(login,password) values(\"$login\",\"$pass\");";
                    $conn->exec($sql);
                    header('Location: autor.php');
                }
                else
                    echo "Данный пользователь уже существует! Попробуйте заново!";
            } 
        }
    }
        if(isset($_POST['Skip']))
        {
            header('Location: autor.php');
        }

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Регистрация</title>
</head>
<body>
    <style>
        .btn
        {
            margin-top: 10px;
            margin-left: 10px;
        }
    </style>
    <form action="#" method="POST">
        <h2> Регистрация </h2>
        <input type="text" name="login" placeholder="Логин" class="btn">
        <br>
        <input type="text" name="pass" placeholder="Пароль" class="btn">
        <br>
        <input type="submit" value = "Зарегистрироваться" name = "Reg" class="btn">
        <input type="submit" value = "Пропустить" name = "Skip" class="btn">
    </form>
</body>
</html>
