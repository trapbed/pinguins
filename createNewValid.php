<?php
$postImg=$_FILES["imagePost"];
$postP=$_POST['titlePost'];
$postTxt=$_POST['contentPost'];
$postCat=$_POST['categoryId'];


// проверка заголовка
echo "<p font='color:green;'>Проверка заголовка :</p>";
if(mb_strlen($postP)<=20 ){
    if($postP==""){
    echo "Вы ввели пустое поле. Заполните заголовок <br>";
    } else
    echo "Тип данных <b>заголовка</b>: строчный. <br> Вы уложились в длинну 20 символов. <br> ";
}
else{
    echo "Слишком большой текст. <br>";
}


// проверка текста
echo "<p>Проверка текста :</p>";

if(mb_strlen($postTxt)<=20 ){
    if($postTxt==""){
    echo "Вы ввели пустое поле. <b>Заполните текст новости <b/><br>";
    } else
    echo "Тип данных <b>текста новости</b>: строчный. <br>";
}
else{
    echo "Слишком большой текст. <br>";
}


// проверка на тип файла(изображение)

echo "<p>Проверка типа файла :</p>";

$types=['image/png', 'image/jpg', 'image/jpeg'];

foreach($types as $i){
    if($postImg['type']==$i){
        echo "Это <b>изображение</b>!!!<br>";
    }
    else{
        echo "Это <b>не изображение</b>(((<br>";
    }
    break;
}
?>