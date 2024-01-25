<?php
    include "connect.php"; //выражение include включает и выполняет указанный файл

    $query_get_category = " select * from categories ";
    $categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));//получаем результат хапроса из переменной Query_get_category 
    //и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса 


    $news= mysqli_query($con, "select * from news")

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пингвины</title>
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
            foreach($categories as $category){
                echo "<a href='#'>$category[1]</a>";
            }
        ?>
        </div>
    </nav>

    <main>
        <section class="last-news">
            <div class="container">
            <?php
                while($new = mysqli_fetch_array($news)){
                    echo "<div class='card'>";
                    echo "<img src='images/pinguin/".$new['image']."'>";
                    echo "<h2 class='title'>".$new['title']."</h2>";
                    echo "<p>".$new['content']."</p>";
                }
            ?>
            </div>
        </section>
    </main>

    <p id="headerTxt">Создайте новость</p>
    <form action="createNewValid.php" method="POST" enctype="multipart/form-data">
        <label for="imagePost">Изображение :</label>
        <input type="file" id="imagePost" name="imagePost">
        <br>
        <label for="titlePost">Заголовок новости :</label>
        <input type="text" id="titlePost" name="titlePost">
        <br>
        <label for="contentPost">Текст новости :</label>
        <textarea name="contentPost" id="contentPost"></textarea>
        <br>
        <label for="categoryId">Категория :</label>
        <select name="categoryId" id="categoryId">
            <option value="first">Первая</option>
            <option value="second">Вторая</option>
            <option value="third">Третья</option>
        </select>
        <br>
        <input type="submit" id="submitBtn" value="Отправить">
    </form>

</body>
</html>