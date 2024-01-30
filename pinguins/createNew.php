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

    <p id="headerTxt">Создайте новость</p>
    <form action="insert.php" method="POST" enctype="multipart/form-data">
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
            <option value="1">Питание</option>
            <option value="2">Содержание</option>
        </select>
        <br>
        <input type="submit" id="submitBtn" value="Отправить">
    </form>



</body>
</html>