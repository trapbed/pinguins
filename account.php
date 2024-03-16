<?php
    $idUser = isset($_COOKIE['id']) ? $_COOKIE['id'] : false;

    if($idUser){

        include "connect.php"; //выражение include включает и выполняет указанный файл

        $query_get_category = " select * from categories ";
        $categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));//получаем результат хапроса из переменной Query_get_category 
        //и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса 
        
        $news= mysqli_query($con, "select * from news");

        $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE user_id = '".$idUser."'"));

        setcookie('username', $user['username'] , time()+3600, '/');

        include "header.php";
    }
    else{
        echo "
        <script>
            alert('Вы не вошли в аккаунт');
            location.href = '/';
        </script>";
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
    <main id='accountMain'>
        <form  action="changeAccount.php" method='POST'>
            <label for="name" class='accountLabel'>Ваше имя пользоватея
                <input class='nonOutline' name = 'name' type="text" value = '<?=$user['username']?>' readonly>
            </label>
            <label for="email" class='accountLabel'>Ваша почта
                <input class='nonOutline' name = 'email' type="text" value = '<?=$user['email']?>' readonly>
            </label>
            <label for="pass" class='accountLabel'>Ваш пароль
                <input class='nonOutline' name = 'pass' type="text" value = '<?=$user['password']?>' readonly>
            </label>
            <div id="changeBlock"><input id = 'accountSubmit' type="submit" value="Изменить данные профиля"><img id='changeAccImg' src='images/pen.png' alt='pen'></div>
        </form>
        
    </main>
    
</body>
</html>