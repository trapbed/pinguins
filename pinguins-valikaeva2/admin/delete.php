<?php
    include "..\connect.php";

    $id = isset($_GET['new']) ? $_GET['new'] : false;

    echo $id;

    $delete = "DELETE FROM `news` WHERE news_id=$id";

    $result = mysqli_query($con, $delete);

    if($result){
        echo "<script>alert('Данные удалены!');location.href='/admin';</script>";
    }
    else{
        echo "<script>alert('Ошибка удаления!".$mysqli_error($con)."');location.href='/admin';</script>";
        
    }


    // function check_error($error, $id){
    //     return "<script>
    //     alert('$error');
    //     location.href = '/admin?new=$id'; 
    //     </script>";
    // }

    // if($id){

    // }

?>