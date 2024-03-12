<?php
    include "connect.php";

    $text_comm = isset($_POST['text_comm']) ? $_POST['text_comm'] : false;
    $new_comm = isset($_POST['new_id']) ? $_POST['new_id'] : false;
    $user_comm = isset($_POST['comm_user']) ? $_POST['comm_user'] : false;

    if($new_comm && $text_comm && $user_comm){
        $create = mysqli_query($con, "INSERT INTO `comments`( `news_id`, `user_id`, `comment_text`) VALUES ($new_comm, $user_comm,'$text_comm')");
        echo "<scpipt>
        alert('Комментарий создан');
            location.href = 'oneNews.php?new=$new_comm';
        </scpipt>";
    }
    else{
        echo "
        <scpipt>
            alert('Вы не можете написать комментарий');
            location.href = 'oneNews.php?new=$new_comm';
        </scpipt>
        ";
    }
?>