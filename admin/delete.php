<?php
    include "..\connect.php";

    $id = isset($_GET['new']) ? $_GET['new'] : false;

    $delete = "DELETE FROM `news` WHERE news_id=$id";

    $result = mysqli_query($con, $delete);

    if($result){
        echo "<script>alert('Данные удалены!');location.href='/admin';</script>";
    }
    else{
        echo "<script>alert('Ошибка удаления!".mysqli_error($con)."');location.href='/admin';</script>";
        
    }

?>

