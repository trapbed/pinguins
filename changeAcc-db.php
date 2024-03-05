<?php 
    include "connect.php";
    $newName = $_POST['name'];
    $newPass = $_POST['email'];
    $newEmail = $_POST['pass'];

    $id = $_COOKIE['id'];

    $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE user_id = $id")); 

    $oldName = $user['username'];
    $oldEmail = $user['email'];
    $oldPass = $user['password'];

if($newName !== $oldName || $newEmail !== $oldEmail || $newPass !== $oldPass){
    $queryUpdateAcc = "UPDATE users SET";

    if($newName !== $oldName){
        $queryUpdateAcc .= " useranme = '$newName'";
        $queryUpdateAcc .= ",";
    }
    if($newEmail !== $oldEmail){
        $queryUpdateAcc .= " email = '$newEmail'";
        $queryUpdateAcc .= ",";
    }
    if($newPass !== $oldPass){
        $queryUpdateAcc .= " password = '$newPass'";
    }

    $queryUpdateAcc .= " WHERE user_id = $id";
    echo "<script> location.href = 'account.php' ;</script>";
}
else{
        echo "<script>alert('Данные актуалные');
        location.href = 'account.php';</script>";
}

?>