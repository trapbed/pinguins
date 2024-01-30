<?php
    include "connect.php"; //выражение include включает и выполняет указанный файл
    

   


    $news= mysqli_query($con, "select * from news");

    $new_id = isset($_GET['new'])?$_GET['new']:false;
    
    //$query_getNew = "SELECT * FROM `news` WHERE news_id=$new_id";
    
    include "header.php";
    
    $new_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM news WHERE news_id=$new_id"));
    
    // print_r($new_info);


    echo "<div class= 'blockOneNews'>
    <div class = 'void2'></div> 
    <img src='images/pinguin/".$new_info['image']."'>";
    echo "<p>".$new_info['publish_date']."</p>";
    echo "<h1>".$new_info['title']."</h1>";
    echo "<span>".$new_info['content']."</span>
    </div>";

?>

</body>
</html>