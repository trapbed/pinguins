<?php
            $postImg=$_FILES["imagePost"];
            $postP=$_POST['titlePost'];
            $postTxt=$_POST['contentPost'];
            $postCat=$_POST['categoryId'];

    include "../connect.php"; //выражение include включает и выполняет указанный файл

    function check_error($error){
        return "<script>alert('$error'); location.href = '../admin';</script>";
    }

    if($postP && $postTxt && $postImg && $postCat){
        if(strlen($title)>50){
            echo check_error('Название должно быть не больше 50-ти символов!');
        }
        else{
            $imgName = $postImg['name'];
            $result = mysqli_query($con, "insert into news (`image`, `title`, `content`, `category_id`) VALUES ('$postImg[name]', '$postP', '$postTxt', $postCat)");
            if($result){
                move_uploaded_file($postImg["tmp_name"], "../images/pinguin/$imgName");
                echo check_error('Новость успешно создана.');
            }
            else {
                echo check_error('Произошла ошибка: '. mysqli_error($con));
            }
        }
    }
    else{
        echo check_error("Все поля должны быть заполнены!");
    }

?>