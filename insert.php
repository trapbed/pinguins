<?php
            $postImg=$_FILES["imagePost"];
            $postP=$_POST['titlePost'];
            $postTxt=$_POST['contentPost'];
            $postCat=$_POST['categoryId'];

    include "connect.php"; //выражение include включает и выполняет указанный файл

    $query_insert = "insert into news (`image`, `title`, `content`, `category_id`) VALUES ('$postImg[name]', '$postP', '$postTxt', $postCat)";
    $insert = mysqli_query($con, $query_insert);//получаем результат хапроса из переменной Query_get_category 
?>