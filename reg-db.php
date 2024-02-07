<?php 

    $login = strip_tags((trim($_POST['login']))); // Удаляет все лишнее и записываем значение в переменную //$login
    $name = strip_tags(trim($_POST['name']));
    $pass = strip_tags(trim($_POST['pass'])); 

    require "connect.php";

    $check = 0;
    if(mb_strlen($login) < 5 || mb_strlen($login) > 100){
        echo "Недопустимая длина логина";
        $check = 1;
        exit();
    }

    $result1 = mysqli_query($con,"SELECT * FROM `users` WHERE email = '$login'");
    $user1 = mysqli_fetch_assoc($result1); // Конвертируем в массив

    if(!empty($user1)){
        echo "Данный логин уже используется!";
        $check = 1;
        exit();
    }

    echo "Вы успешно зарегистрированы! ";

    setcookie('name', $name, time() + 3600, '/');

    mysqli_query($con,"INSERT INTO users ( email, password, username) VALUES ('".$login."', '".$pass."', '".$name."')");