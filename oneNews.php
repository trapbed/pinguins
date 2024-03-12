<?php
    include "connect.php"; //выражение include включает и выполняет указанный файл
    
    $news= mysqli_query($con, "select * from news");

    $new_id = isset($_GET['new'])?$_GET['new']:false;
    
    //$query_getNew = "SELECT * FROM `news` WHERE news_id=$new_id";
    
    include "header.php";
    
    if($new_id){$new_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM news JOIN categories ON  news.category_id=categories.category_id WHERE news_id=$new_id"));
    
    $month=['01'=>'Января','02'=>'Февраля', '03'=>'Марта', '04'=>'Апреля', '05'=>'Мая', '06'=>'Июня', '07'=>'Июля', '08'=>'Августа', '09'=>'Сентября', '10'=>'Октября', '11'=>'Ноября', '12'=>'Декабря'];

    $mon = $new_info['publish_date'];//date

    $monthNew = substr($mon, 5, 2);//cut

    $m_text = $month[$monthNew];//

    $comments_res = (mysqli_query($con, "SELECT username, comment_text, comment_date FROM `comments` JOIN users ON users.user_id=comments.user_id WHERE news_id = $new_id"));

    $comments = mysqli_fetch_all($comments_res);

    $new_info['publish_date']= strtotime($new_info['publish_date']);//converter

    $new_info['publish_date']=date("d ".$m_text." Y H:i:s", ($new_info['publish_date']));//вывод даты публ
    }

    else{
        header("Location: /");
    }
    echo "<div class= 'blockOneNews'>
    <div class = 'void2'></div> 
    <img src='images/pinguin/".$new_info['image']."'>";
    echo "<h1>".$new_info['title']."</h1>";
    echo "<div id=''<p>Категория новости :".$new_info['name']."</p><p>".$new_info['publish_date']."</p></div>";
    echo "<span>".$new_info['content']."</span>
    <h3>Комментарии</h3>";
    if($comments){
        foreach ($comments as $comm){
            $mon_comm = $comm[2];//date
            $monthNew_comm = substr($mon_comm, 5, 2);//cut
            $m_text_comm = $month[$monthNew_comm];//
            $comm[2]= strtotime($comm[2]);//converter
            $comm[2]=date("d ".$m_text_comm." Y H:i:s", ($comm[2]));

            echo "
            <br>
            <div class='card'>
                <div class='card-body'>";
                    echo "
                    <h4>$comm[0]</h4>
                    <i>$comm[2]</i><br>
                    <h5>$comm[1]</h5>";
                    // print_r($comm);
                echo "</div>
            </div>";
    }
    
    $count_comm = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM comments WHERE news_id = $new_id"));
    echo "<br>Количество комментариев: $count_comm[0]";}
    else{ echo "<i>Комментариев пока нет !</i>";}
    echo "</div>";
    if(isset($_COOKIE['id'])){
        $id_user = $_COOKIE['id'];
        $user = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE user_id =  $id_user"));

        echo "
        <br>
        <div id='forWDYM'><h2 id='whatDoYouMean'>Что вы думаете об этом ? </h2></div>
        <form id='comments' action='comment-db.php' method='POST'>
            <label for='text_comm'>
                <input type='text' name='text_comm' id='text_comm'>
            </label>
            <label for='new_id'>
                <input type='hidden' name='new_id' id='new_id' value='$new_id'>
            </label>
            <label for='comm_user'>
                <input type='hidden' name='comm_user' id='comm_user' value='$user[0]'>
            </label>
            <input type='submit' id='comm_submit' value='Оставить комментарий'>
        </form>
        ";
    }
    else{
        echo "<span>Что бы оставить комментарии войдите в аккаунт !</span>";
    }
?>

</body>
</html>