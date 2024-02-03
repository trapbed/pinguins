<?php
    include "connect.php"; //выражение include включает и выполняет указанный файл
    
    $news= mysqli_query($con, "select * from news");

    $new_id = isset($_GET['new'])?$_GET['new']:false;
    
    //$query_getNew = "SELECT * FROM `news` WHERE news_id=$new_id";
    
    include "header.php";
    
    $new_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM news JOIN categories ON  news.category_id=categories.category_id WHERE news_id=$new_id"));
    
    $month=['01'=>'Января','02'=>'Февраля', '03'=>'Марта', '04'=>'Апреля', '05'=>'Мая', '06'=>'Июня', '07'=>'Июля', '08'=>'Августа', '09'=>'Сентября', '10'=>'Октября', '11'=>'Ноября', '12'=>'Декабря'];

    $mon = $new_info['publish_date'];//date

    $monthNew = substr($mon, 5, 2);//cut

    $m_text = $month[$monthNew];//

    $new_info['publish_date']= strtotime($new_info['publish_date']);//converter

    $new_info['publish_date']=date("d ".$m_text." Y H:i:s", ($new_info['publish_date']));//вывод даты

    echo "<div class= 'blockOneNews'>
    <div class = 'void2'></div> 
    <img src='images/pinguin/".$new_info['image']."'>";
    echo "<h1>".$new_info['title']."</h1>";
    echo "<div id=''<p>Категория новости :".$new_info['name']."</p><p>".$new_info['publish_date']."</p></div>";
    echo "<span>".$new_info['content']."</span>
    </div>";

?>

</body>
</html>