<?php
    include "connect.php"; //выражение include включает и выполняет указанный файл

    $query_get_category = " select * from categories ";
    $categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));//получаем результат хапроса из переменной Query_get_category 
    //и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса 

    $thisCat = isset($_GET['category']) ? $_GET['category'] : false;

    $sort = isset($_GET['sort']) ? $_GET['sort'] : false;
    
    include "header.php";

?>

    <h3  id='sortHead'>Сортировать</h3>
    <main>
        <form action="index.php" method='GET' id='sort-form'>
        <select class="form-select" aria-label="Default select example" name='sort' id='sort-select'>
            <option value="" <?= ($sort and $sort == "") ? "selected" : ""; ?>>Без сортировки</option>
            <option value="publish_date ASC" <?= ($sort and $sort == "publish_date ASC") ? "selected" : ""; ?>>по дате (сначала старые)</option>
            <option value="publish_date DESC" <?= ($sort and $sort == "publish_date DESC") ? "selected" : ""; ?>>по дате (сначала новое)</option>
            <option value="title ASC" <?= ($sort and $sort == "title ASC") ? "selected" : ""; ?>>по названию (А-Я)</option>
            <option value="title DESC" <?= ($sort and $sort == "title DESC") ? "selected" : ""; ?>>по названию (Я-А)</option>
        </select>
        <input type="hidden" name="category" value='<?=$thisCat?>'>
        </form>



        <section class="last-news">
            <div class="container">
            <?php

        $news ="";


        $querySort = "select * from news";

        if ($thisCat ) { $querySort .= " where category_id=$thisCat";}
        else if ($sort) { $querySort .= " order by $sort";}
        else if ($textSearch) { $querySort .= "WHERE content LIKE '%$textSearch%' OR title LIKE '%$textSearch%'"; }
        
        $news = mysqli_query($con, $querySort);

        

                $count = 0;
                while($new = mysqli_fetch_array($news)){
                    $new_id = $new['news_id'];
                    echo "<div class='void'></div>";
                    echo "<div class='card'>";
                    echo "<a href='oneNews.php?new=$new_id'><img src='images/pinguin/".$new['image']."'></a>";
                    echo "<p>".$new['publish_date']."</p>";
                    echo "<h2 class='title'>".$new['title']."</h2>";
                    $count++;
                }
                if($count==0){
                    echo "<p id='notNews'>Новостей нет!</p>";
                }
            ?>
            </div>
        </section>
    </main>
    <script>
        $("#sort-select").change(function() {
            $("#sort-form").submit();
        });
  </script>
</body>
</html>