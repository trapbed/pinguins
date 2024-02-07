<?php


    $login = strip_tags(trim($_POST['login']));
    $pass = strip_tags(trim($_POST['pass']));

    require ("connect.php");

    $user = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE email='$login' AND password='$pass'" ));

    // print_r($user);

    if(empty($user['username']) AND empty($user['password'])){
        echo "Такой пользователь не найден.";
        exit();
    }
    else if(empty($user['username']) OR empty($user['password'])){
        echo "Логин или пароль введены неверно";
        exit();
    }
    
    setcookie('user', $user['user_id'], time() + 3600, "/");
    setcookie('name', $user['username'], time() + 3600, "/");
    
    header('Location: page.php');

?>