<?php
include "connect.php";

$postImg=$_FILES["imagePost"];
$postP=$_POST['titlePost'];
$postTxt=$_POST['contentPost'];
$postCat=$_POST['categoryId'];

$title = isset($postP)?$postP:false;
$text = isset($postTxt)?$postTxt:false;
$file = isset($_FILES['image']['tmp_name'])?$postImg:false;
$category = isset($postCat)?$postCat:false;

function check_error($error){
    return "<script>
    alert($error);
    location.href = 'createNew.php' 
    </script>";
}

if($title && $text && $file && $category){
    if (strlen($title)>20) echo check_error('Название не должно превышать 20 символов!!!');
    $result = mysqli_query($con, "insert into news (`image`, `title`, `content`, `category_id`) VALUES ('$postImg[name]', '$postP', '$postTxt', $postCat)");

    if($result){
        move_uploaded_file($file['name'], "images/myPinguin/".$file['name'].")");
        check_error('Новость успешно создана');
    }
    else check_error('Произошла ошибка'.mysqli_error($con));
}
else{
    echo check_error("Все поля должны быть заполнены!!!");
}
?>