<?php 

    $login = strip_tags((trim($_POST['login']))); // Удаляет все лишнее и записываем значение в переменную //$login
    $name = strip_tags(trim($_POST['name']));
    $pass = strip_tags(trim($_POST['pass'])); 

    require "connect.php";

    
    if(mb_strlen($login) == 0 || mb_strlen($name) == 0 || mb_strlen($pass) == 0){  
    echo "У вас есть незаполненные поля";
    exit();
   }

    if(mb_strlen($login) < 5 || mb_strlen($login) > 100){
        echo "Недопустимая длина логина";
        exit();
    }

    $result1 = mysqli_query($con,"SELECT * FROM `users` WHERE email = '$login'");
    $user1 = mysqli_fetch_assoc($result1); // Конвертируем в массив

    if(!empty($user1)){
        echo "Данный логин уже используется!";
        exit();
    }

    echo "Вы успешно зарегистрированы! ";

    setcookie('id', $name, time() + 3600, '/');

    mysqli_query($con,"INSERT INTO users ( email, password, username) VALUES ('".$login."', '".$pass."', '".$name."')");

    // session_start();

    // $_SESSION['id'] = mysqli_insert_id($con);

    setcookie('id', mysqli_insert_id($con) , time()+3600, '/');

    echo "<script>location.href = 'account.php'</script>";