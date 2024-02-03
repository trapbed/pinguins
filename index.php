<?php
    include "connect.php"; //выражение include включает и выполняет указанный файл

    $query_get_category = " select * from categories ";
    $categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));//получаем результат хапроса из переменной Query_get_category 
    //и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса 


    $news= mysqli_query($con, "select * from news");
    include "header.php";


?>

    <main>
        <section class="last-news">
            <div class="container">
            <?php
                while($new = mysqli_fetch_array($news)){
                    $new_id = $new['news_id'];
                    echo "<div class='void'></div>";
                    echo "<div class='card'>";
                    echo "<a href='oneNews.php?new=$new_id'>".$new_id."</a>";
                    echo "<img src='images/pinguin/".$new['image']."'>";
                    echo "<h2 class='title'>".$new['title']."</h2>";
                }
            ?>
            </div>
        </section>
    </main>

</body>
</html>