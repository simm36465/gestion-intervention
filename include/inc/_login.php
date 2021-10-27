<?php
session_start();
include("connect.php");

if(isset( $_POST['USER']))
$name = $_POST['USER'];
if(isset( $_POST['PASS']))
$pass = $_POST['PASS'];

if ($name === ''){
echo "Name cannot be empty.";
die();
}else if ($pass === ''){
echo "Password cannot be empty.";
die();
}else{

    $verfuser = "SELECT * FROM admin WHERE username= :name";
    $exist_user = $conn->prepare($verfuser);
    $exist_user->bindParam(':name', $name, PDO::PARAM_STR);
    $exist_user->execute();
    $num_un_ex = $exist_user->rowCount();
    if ($num_un_ex > 0) {

        $verfpwd = "SELECT * FROM admin WHERE username= :name";
        $exist_pwd = $conn->prepare($verfpwd);
        $exist_pwd->bindParam(':name', $name, PDO::PARAM_STR);
        $exist_pwd->execute();
        $num_un_ex = $exist_pwd->rowCount();
        if ($num_un_ex > 0) {
            while($row = $exist_pwd->fetch(PDO::FETCH_ASSOC)){
                if (password_verify($pass, $row['pwd'])) {
                    $_SESSION["USER"] = $row['username'];
                    $_SESSION["TOKEN"] = $row['token'];
                    echo "DONE";
                } else {
                    echo 'Password Incorrect';
                }
            }
        }else{
            echo "this user not found";
        }


    }else {
        echo 'Username Incorrect';
    }



}




?>