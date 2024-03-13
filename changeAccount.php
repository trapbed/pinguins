<?php 
    // echo $_POST['name'];
    // echo $_POST['pass'];
    // echo $_POST['email'];
?>

<?php
    include "connect.php"; //выражение include включает и выполняет указанный файл

    $idUser = $_COOKIE['id'];
    $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE user_id = $idUser")); 
    
    include "header.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
    <main id='accountMain'>
        <p id = 'checkP'>Изменение аккаунта</p>
        <form action="changeAcc-db.php" method='POST'>
            <label for="name" class='accountLabel'>Ваше имя пользователя
                <input class='nonOutline' name = 'name' type="text" value = '<?=$user['username']?>' required>
            </label>
            <label for="pass" class='accountLabel'>Ваша почта
                <input class='nonOutline' name = 'pass' type="text" value = '<?=$user['email']?>' required>
            </label>
            <label for="email" class='accountLabel'>Ваша пароль
                <input class='nonOutline' name = 'email' type="text" value = '<?=$user['password']?>' required>
            </label>
            <input id = 'accountSubmit' type="submit" value="Сохранить изменения">
        </form>
        
    </main>
    
</body>
</html>