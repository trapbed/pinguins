<?php
            $postImg=$_FILES["imagePost"];
            $postP=$_POST['titlePost'];
            $postTxt=$_POST['contentPost'];
            $postCat=$_POST['categoryId'];

    include "connect.php"; //выражение include включает и выполняет указанный файл

    $types=['image/png', 'image/jpg', 'image/jpeg'];
    
    foreach($types as $i){

            if(mb_strlen($postP)<=20 && $postP!=="" &&  $postTxt!=="" && $postImg['type']==$i){
                $query_insert = "insert into news (`image`, `title`, `content`, `category_id`) VALUES ('$postImg[name]', '$postP', '$postTxt', $postCat)";
                $insert = mysqli_query($con, $query_insert);
            }
            else{
                if(mb_strlen($postP)>20 ){
                    echo "Слишком длинный заголовок <br>";
                }
                if($postP==""){
                    echo "Пустой заголовок";
                }
                if(mb_strlen($postTxt)>20 ){
                    echo "Слишком длинный текст заголовка <br>";
                }
                if($postTxt==""){
                    echo "Пустой текст новости <br>";
                } 
                if ($postImg['type']!==$i){
                    echo "Это не изображение";
                }
            }
            break;


        }
    

?>