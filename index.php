<?php
    include "connect.php"; //выражение include включает и выполняет указанный файл

    $query_get_category = " select * from categories ";
    $categories = mysqli_fetch_all(mysqli_query($con, $query_get_category));//получаем результат хапроса из переменной Query_get_category 
    //и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса 

    $thisCat = isset($_GET['category']) ? $_GET['category'] : false;

    $sort = isset($_GET['sort']) ? $_GET['sort'] : false;

    $pinguin_count = 3;//limit n
    // проверка выбранной страницы, дефолтное= 1
    $page = isset($_GET['page']) ? $_GET['page'] : 1 ;
    $offset = $page * $pinguin_count - $pinguin_count; //offset m

  

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
            <div class="containerU">
            <?php

        $news ="";


        $querySort = "select * from news";

        if ($thisCat ) { $querySort .= " where category_id=$thisCat";}
        if ($sort) { $querySort .= " order by $sort";}
        if ($textSearch) { $querySort .= " WHERE title LIKE '%$textSearch%'"; }
        // else{$querySort.= " LIMIT $pinguin_count OFFSET $offset";}

        $query = mysqli_query($con, $querySort." LIMIT $pinguin_count OFFSET $offset");

        $count_pinguins = mysqli_num_rows(mysqli_query($con, $querySort));

        
        $news = mysqli_query($con, $querySort);

        
        

                $count = 0;
                while($new = mysqli_fetch_array($query)){
                    
                    $new_id = $new['news_id'];
                    echo "<div class='void'></div>";
                    echo "<div class='cardS'>";
                    $count_comm = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM comments WHERE news_id = $new_id"));
                    echo "<a href='oneNews.php?new=$new_id'><img src='images/pinguin/".$new['image']."'></a>";
                    echo "<p>".$new['publish_date']."</p>";
                    echo "Количество комментариев: $count_comm[0]";
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

    <nav id='pagination' aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a></li>
            <?php for($i=1; $i<=ceil($count_pinguins/$pinguin_count); $i++){ ?>
            <li class="page-item"><a class="page-link" href="?page=<?=$i?> "> 
            <?=$i?>
            <?php } ?>
            </a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>

    <script>
        $("#sort-select").change(function() {
            $("#sort-form").submit();
        });
  </script>
</body>
</html>