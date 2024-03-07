<?php   
    setcookie('id', $id, time() - 3600, "/");
    header('Location: /');    
?>