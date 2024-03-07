<?php
    include "connect.php"; //выражение include включает и выполняет указанный файл

    $query_get_category = " select * from categories ";
    $categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));//получаем результат хапроса из переменной Query_get_category 
    //и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса 
    
    $news= mysqli_query($con, "select * from news");
    include "header.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>Вход/Регистрация</title>
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="containermt" id='highCont'>
    <h1>Форма регистрации</h1>
    <form action="reg-db.php" method="post" class='formAuth' id='highForm'>
        <input type="text" name="name" id="name" class="form-control" placeholder="Имя"><br>
        <input type="text" name="login" class="form-control" id="login" placeholder="Почта"><br>
        <input type="password" name="pass" class="form-control" id="pass" placeholder="Пароль"><br>
        <div id='forButtons'>
            <button class="btn-success">Зарегистрироваться</button>
        </div>
    </form> 
</div>
</body>
