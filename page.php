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
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Привет, <?php echo $_COOKIE['name'];?>!</h1>
	<a href="exit.php">Что бы выйти нажмите по ссылке.</a>
</body>
</html>