<?php

    //select option
    include "connect.php";

    $query_category = "SELECT * FROM categories";

    $categories = mysqli_query($con, $query_category);

    //navigation

    include "header.php";
?>



    <p id="headerTxt">Создайте новость</p>
    <form action="insert.php" method="POST" enctype="multipart/form-data">
        <label for="imagePost">Изображение :</label>
        <input type="file" id="imagePost" name="imagePost" accept="image/*">
        <br>
        <label for="titlePost">Заголовок новости :</label>
        <input type="text" id="titlePost" name="titlePost">
        <br>
        <label for="contentPost">Текст новости :</label>
        <textarea name="contentPost" id="contentPost"></textarea>
        <br>
        <label for="categoryId">Категория :</label>
        <select name="categoryId" id="categoryId">
            <!-- <option value="1">Питание</option>
            <option value="2">Содержание</option> -->
            <?php
                foreach($categories as $categ){
                    echo "<option value = '".$categ[0]."'>".$categ[1]."</option>";
                }

                // while($cat = mysqli_fetch_assoc($categories)){
                //     echo "<option value = '".$cat['category_id']."'>".$cat['name']."</option>";
                // }
            ?>
        </select>
        <br>
        <input type="submit" id="submitBtn" value="Отправить">
    </form>



</body>
</html>