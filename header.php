<?php 
 $query_get_category = " select * from categories ";
 $categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));//получаем результат хапроса из переменной Query_get_category 
 //и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        echo date("$week, $month d, 20y");
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
        <?php
        
            foreach($categories as $categ){
                echo "<a href='#'>$categ[1]</a>";
            }
        ?>
        </div>
    </nav>