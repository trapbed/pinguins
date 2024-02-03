<?php
    include "../connect.php";

    $id =       isset($_POST['id']) ? $_POST['id'] : false;
    $title =    isset($_POST['titlePost']) ? $_POST['titlePost'] : false;
    $text =     isset($_POST['contentPost']) ? $_POST['contentPost'] : false;
    $file =     ($_FILES['imagePost']['size'] != 0) ? $_FILES['imagePost'] : false;
    $category = isset($_POST['categoryId']) ? $_POST['categoryId'] : false;

    $new_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM news WHERE news_id = $id"));

    $query_update = "UPDATE news SET ";

    $check_update = false;

    //добавляем запросы
    if($new_info['title']!= $title) {    
        $query_update.="`title` = '$title', ";
        $check_update = true;
    }
    if($new_info['content']!= $text){
        $query_update.="`content` = '$text', ";
        $check_update = true;
    }
    if($new_info['category_id']!= $category){
        $query_update.=" `category_id` = $category, ";
        $check_update = true;
    }
    if($file){  
        $query_update .= "`image` ="."'".$file['name']."', ";
        move_uploaded_file($file['tmp_name'], " ../images/pinguin/$file[name]");
        $check_update = true;
    }
    
    function check_error($error, $id){
        return "<script>
        alert('$error');
        location.href = '/admin?new=$id'; 
        </script>";
    }

    if($check_update){
        $query_update = substr($query_update, 0, -2);
        $query_update.= " WHERE news_id= $id "; var_dump($query_update);
        $result = mysqli_query($con, $query_update);
        if($result){
            echo check_error("Данные обновлены!", $id);
        }
        else{
            echo check_error("Ошибка обновления!", mysqli_error($con), $id);
        }
    }
    else{
        echo check_error("Данные еще актуальны!", $id);
    }

?>