<?php
    require "connect.php";

    $query = mysqli_query($con, "SELECT title, publish_date, categories.name FROM `news` JOIN categories on news.category_id=categories.category_id order by news.category_id;");
    $allNews = mysqli_fetch_all($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="search">
        <div id="underHrHead">

            <div id="underLeft">
                <div id="ulL">
                    <img src="images/menu.png" alt="menu" id=menu>
                    <span>Секции</span>
                </div>

                <hr id="middle">

                <div id="ulR">
                    <img src="images/search.png" alt="search" id="searchImg">
                    <span>Поиск</span>
                </div>
            </div>

            <div id="underRight">
                <img src="images/man.png" alt="man" id=manImg>
                <span>Войти</span>
            </div>
        </div>
        <hr id="hrHead">
    </div>

    <div id="titleNWeather">
        <div id="inTitle">
            <span>Пингвины</span>
            <div id="dayNWeather">
                <?php
                // Понедельник, Январь 1, 2018

                switch (date("w")){
                    case 1:
                        $week= "Понедельник";
                        break;
                    case 2:
                        $week= "Вторник";
                        break;
                    case 3:
                        $week= "Среда";
                        break;
                    case 4:
                        $week= "Четверг";
                        break;
                    case 5:
                        $week= "Пятница";
                        break;
                    case 6:
                        $week= "Суббота";
                        break;
                    case 7:
                        $week= "Воскресенье";
                        break;
                }
                switch (date("m")){
                    case 1:
                        $month= "Январь";
                        break;
                    case 2:
                        $month= "Февраль";
                        break;
                    case 3:
                        $month= "Март";
                        break;
                    case 4:
                        $month= "Апрель";
                        break;
                    case 5:
                        $month= "Май";
                        break;
                    case 6:
                        $month= "Июнь";
                        break;
                    case 7:
                        $month= "Июль";
                        break;
                    case 8:
                        $month= "Август";
                        break;
                    case 9:
                        $month= "Сентябрь";
                        break;
                    case 10:
                        $month= "Октябрь";
                        break;
                    case 11:
                        $month= "Ноябрь";
                        break;
                    case 12:
                        $month= "Декабрь";
                        break;
                }
                echo date("$week,  $month d, 20y");
                ?>
                <div id="weather">
                    <img src="images/sun.png" alt="sun" id="weatherImg">
                    <span>- 23 °C</span>
                </div>
            </div>
        </div>
    </div>

    <nav>
        <div>
            <a href="#">новости</a>
            <a href="#">мнения</a>
            <a href="#">наука</a>
            <a href="#">жизнь</a>
            <a href="#">путешествия</a>
            <a href="#">деньги</a>
            <a href="#">искусство</a>
            <a href="#">спорт</a>
            <a href="#">люди</a>
            <a href="#">здоровье</a>
            <a href="#">образование</a>
        </div>
    </nav>

    <div id="allNews">
        <p id="weNews">Наши новости</p>
        <table>

            <tr id='headTable'>
                <td>Заголовок</td>
                <td>Дата публикации</td>
                <td id='last'>Категория</td>
            </tr>
        
            <?php
                foreach($allNews as $news){
                    echo "<tr> <td>$news[0]</td> <td>$news[1]</td> <td id='last'>$news[2]</td> </tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>