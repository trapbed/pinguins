<?php
    require "..\connect.php";
   

    $query = mysqli_query($con, "SELECT news_id, title, publish_date, categories.name, image FROM `news` JOIN categories on news.category_id=categories.category_id order by news.category_id;");
    $allNews = mysqli_fetch_all($query);
    

    require "..\header.php";

    $id_new = isset($_GET["new"]) ? $_GET["new"] : false ;

    if($id_new){
        $new_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM news WHERE news_id = $id_new"));
    }
?>


    <div id="allNews">
        <p id="weNews"><?= $id_new?"Редактирование новости № $id_new":"Создание новости";?></p>
        <table>

            <tr id='headTable'>
                <!-- <td>Создать</td> -->
                <td>Заголовок</td>
                <td>Дата публикации</td>
                <td >Категория</td>
                <td >Изображение</td>
                <td>Изменить</td>
                <td id='last'>Удалить</td>
            </tr>
        
            <!-- <td><a href='../admin'>".$news[0]."</td> -->
            <?php
                foreach($allNews as $news){
                    echo "<tr>  <td>$news[1]</td> 
                          <td>$news[2]</td> 
                          <td >$news[3]</td> 
                          <td > <img src='../images/pinguin/".$news[4]."'></td> 
                          <td > <a href='?new=".$news[0]."'> Изменить </a> </td>
                          <td id='last'> <a href='delete.php?new=".$news[0]."'> Удалить </a> </td> </tr>";
                }

                
            ?>
        </table>
            
        
        <a href="../admin"><img id='createNews' src='../images/plus.png' alt='Добавить новость'></a>
        

        <form action="<?=$id_new?"update":"insert";?>.php" method="POST" enctype="multipart/form-data">
            <label for="imagePost">Изображение :</label>
            <input type="file" id="imagePost" name="imagePost" accept="image/*">
            <?=$id_new? "<img src='../images/pinguin/".$new_info['image']."' alt='такого изображения нет' id='preview'>":"";?>
            <br>
            <label for="titlePost">Заголовок новости :</label>
            <input type="text" id="titlePost" name="titlePost" value="<?=$id_new?$new_info['title']:"";?>"><!--выводим в инпут значение из массива-->
            <br>
            <label for="contentPost">Текст новости :</label>
            <textarea name="contentPost" id="contentPost"><?=$id_new?$new_info['content']:"";?></textarea>
            <br>
            <label for="categoryId">Категория :</label>
            <select name="categoryId" id="categoryId">
                <!-- <option value="1">Питание</option>
                <option value="2">Содержание</option> -->
                <?php
                    foreach($categories as $categ){
                        if($categ[0]==$new_info['category_id']){
                            echo "<option selected value = '".$categ[0]."'>".$categ[1]."</option>";
                        }
                        else{
                            echo "<option value = '".$categ[0]."'>".$categ[1]."</option>";
                        }
                    }

                    // while($cat = mysqli_fetch_assoc($categories)){
                    //     echo "<option value = '".$cat['category_id']."'>".$cat['name']."</option>";
                    // }
                ?>
            </select>
            <?=$id_new? "<input type='hidden' name='id' value='$id_new'>" : "";?>
            <br>
            <input type="submit" id="submitBtn" value="Отправить">
        </form>

    </div>
</body>
</html>


