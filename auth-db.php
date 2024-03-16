<?php


    $login = strip_tags(trim($_POST['login']));
    $pass = strip_tags(trim($_POST['pass']));

    require ("connect.php");

    $user = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE email='$login' AND password='$pass'" ));

    if(empty($user['username']) AND empty($user['password'])){
        echo "
        <script>
            alert('Такой пользователь не найден.');
            location.href='/';
        </script>";
        exit();
    }
    else if(empty($user['username']) OR empty($user['password'])){
        echo "
        <script>
            alert('Логин или пароль введены неверно');
            location.href='/';
        </script>";

        exit();
    }
    
    setcookie('id', $user['user_id'], time() + 3600, "/");
    setcookie('name', $user['username'], time() + 3600, "/");
    
    header('Location: account.php');

?>