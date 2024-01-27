<?php
            $postImg=$_FILES["imagePost"];
            $postP=$_POST['titlePost'];
            $postTxt=$_POST['contentPost'];
            $postCat=$_POST['categoryId'];

    include "connect.php"; //выражение include включает и выполняет указанный файл

    $types=['image/png', 'image/jpg', 'image/jpeg', 'image/jpeg'];
    
    foreach($types as $i){

            if(mb_strlen($postP)<=20 && $postP!=="" &&  $postTxt!=="" && substr($postImg["type"], 0, 5) == "image"){
                $query_insert = "insert into news (`image`, `title`, `content`, `category_id`) VALUES ('$postImg[name]', '$postP', '$postTxt', $postCat)";
                $insert = mysqli_query($con, $query_insert);
                echo "<h1>Ваша новость была отправлена !</h1>";
            }
            else{
                echo "<h1>Ваша новсть не отправлена по причинам :<br></h1>";
                if(mb_strlen($postP)>20 ){
                    echo "Слишком длинный заголовок <br>";
                }
                if($postP==""){
                    echo "Пустой заголовок <br>";
                }
                if(mb_strlen($postTxt)>20 ){
                    echo "Слишком длинный текст новости <br>";
                }
                if($postTxt==""){
                    echo "Пустой текст новости <br>";
                } 
                if (substr($postImg["type"], 0, 5) !== "image"){
                    echo "Это не изображение <br>";
                }
            }
            break;


        }
    

?>