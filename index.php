<?php
    include "connect.php"; //выражение include включает и выполняет указанный файл

    $query_get_category = " select * from categories ";
    $categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));//получаем результат хапроса из переменной Query_get_category 
    //и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса 

    $thisCat = isset($_GET['category']) ? $_GET['category'] : false;

    $news ="";

    if($thisCat){
        $news = mysqli_query($con, "select * from news where category_id = $thisCat");
    }
    else{
        $news = mysqli_query($con, "select * from news");
    }

    include "header.php";

?>

    <main>
        <section class="last-news">
            <div class="container">
            <?php
                    // var_dump(mysqli_fetch_assoc($news));
                $count = 0;
                while($new = mysqli_fetch_array($news)){
                    $new_id = $new['news_id'];
                    echo "<a href='oneNews.php?new=$new_id'>";
                    echo "<div class='void'></div>";
                    echo "<div class='card'>";
                    echo "<img src='images/pinguin/".$new['image']."'>";
                    echo "<h2 class='title'>".$new['title']."</h2>";
                    echo "</a>";
                    $count++;
                }
                if($count==0){
                    echo "<p id='notNews'>Новостей нет!</p>";
                }
            ?>
            </div>
        </section>
    </main>

</body>
</html>