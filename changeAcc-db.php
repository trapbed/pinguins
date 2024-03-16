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
    $check = false;
if(mb_strlen($newEmail) < 5 || mb_strlen($newEmail) > 100){
    echo "<script>alert('Недопустимая длина логина')</script>
    location.href='changeAccount.php'";
}
else{
    if($newName !== $oldName || $newEmail !== $oldEmail || $newPass !== $oldPass){
        $queryUpdateAcc = "UPDATE users SET";

        if($newName !== $oldName){
            $check = true;
            $queryUpdateAcc .= " useranme = '$newName', ";
        }
        if($newEmail !== $oldEmail){
            $check = true;
            $queryUpdateAcc .= " email = '$newEmail', ";
        }
        if($newPass !== $oldPass){
            $check = true;
            $queryUpdateAcc .= " password = '$newPass', ";
        }

        function check($error){
            return "<script>
            alert('$error');
            location.href='account.php';
            </script>";
        }

        if($check){
            $queryUpdateAcc = substr($queryUpdateAcc, 0, -2);
            $queryUpdateAcc .= " WHERE user_id = $id";
            $result = mysqli_query($con, $queryUpdateAcc);
            if($result){
                echo check("Данные обновлены!");
            }
            else{
                echo check("Ошибка обновления!".mysqli_error($con));
            }
        }
    }
    else{
            echo "<script>alert('Данные актуальные');
            location.href = 'account.php';</script>";
    }
}
?>