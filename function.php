<?php
require_once 'connect.php';

function emptyinput($uname, $pwd, $email, $phone_number){
    if(empty($uname) || empty($email) || empty($pwd) || empty($phone_number)){
        return true;
    }
    else{
        return false;
    }
}

function  invalidUid($username) {
    if(!preg_match("/^[a-zA-Z0-9_]+$/", $username)){
        return true;
    }
    else{
        return false;
    }
}

function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result= true;
    }
    else{
        $result= false;
    }
    return $result;
}

function invalidPhoneNumber($phone_number){
    if(!preg_match("/^9[6-8][0-9]{8}$/", $phone_number)){
        return true;
    }
    else{
        return false;
    }
}

function userexist($uname,$email){
    global $conn;

    $sql= "SELECT * FROM users WHERE username = '$uname' OR email = '$email';";
    
    $result= mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        return true;
    }
    else{
        return false;
    }
}