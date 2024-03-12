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
    <link rel="stylesheet" href="../style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
</head>
<body>    
    <div id="search">
        <div id="underHrHead">

            <div id="underLeft">
                <div id="ulL">
                    <img src="../images/menu.png" alt="menu" id=menu>
                    <span>Секции</span>
                </div>

                <hr id="middle">

                <div id="ulR">
                </div>
            </div>

            <form action="index.php" method="GET" class='text'>
                <input type="text" name="text" class="text" id='text' placeholder='Поиск' value="">
            </form>

            <div id="underRight">
                    <?= isset($_COOKIE['id']) ? "<span><a id='logIn' href='account.php'>".$_COOKIE['name']."</a></span>" : "<a href='../reg.php'><img src='../images/man.png' alt='man' id=manImg></a>"?>
                <span>
                    <?php
                        echo isset($_COOKIE['id']) ? "<a id='logIn' href='../exit.php'>Выйти</a>" : "<a id='logIn' href='../auth.php'>Войти</a>";

                        // $id = isset($_COOKIE['id']) ? $_COOKIE['id'] : false;

                        // if($id){
                        //     $user_name_array = mysqli_fetch_assoc(mysqli_query($con, "SELECT username FROM users WHERE user_id = $id"));
                        //     $user_name = $user_name_array['username'];
                        //     echo "<span><a id='logIn' href='../exit.php'>Выйти ".$user_name."</a></span>";
                        // }
                        // else{
                        //     echo "<span><a id='logIn' href='../auth.php'>Войти</a></span>";
                        // }
                    ?>
                </span>
            </div>
        </div>
        <hr id="hrHead">
    </div>

    <div id="titleNWeather">
        <div id="inTitle">
            <a href='index.php' class='headerHead'><span>Пингвины</span></a>
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
                    <img src="../images/sun.png" alt="sun" id="weatherImg">
                    <span>- 23 °C</span>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <div>
        <?php
            foreach($categories as $categ){
                echo "<a href='../index.php?category=$categ[0]'>$categ[1]</a>";
            }
        ?>
        </div>
    </nav>

    <script>
        let search =document.getElementById("text");
        search.addEventListener('keypress', function(e){
            if(e.key === 'Enter'){
                <?php
                    $textSearch = isset($_GET['text']) ? $_GET['text'] : false;
                    print_r($textSearch);
                ?>
            }
        })
    </script>