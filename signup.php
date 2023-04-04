<?php
error_reporting(E_ALL);
require_once 'connect.php';



if(isset($_POST['username'])){
    $username= trim($_POST['username']);
    $pwd= trim($_POST['password']);
    $email= trim($_POST['email']);
    $phone_number= trim($_POST['phone_number']);
       
    require_once 'function.php';
    
    if (emptyinput($username, $pwd, $email, $phone_number)) {
        header("location: ../project1/index.html?error=emptyinput");
        exit ();
    }
    if(userexist($username, $email)){
        header("location: ../project1/index.html?error=userexist");
        exit ();
    }
   
    if (invalidUid($username)) {
        header("location: ../project1/index.html?error=invaliduid");
        exit ();
    }

    if (invalidEmail($email)) {
        header("location: ../project1/index.html?error=notmatch");
        exit ();
    }
    if(invalidPhoneNumber($phone_number)){
        header("location: ../project/index.html?error=invalidphonenumber");
        exit();
    }
}
else{
    header("location: ../project1/index.html");
    exit ();
}

$inserted = mysqli_query($conn, "INSERT INTO users VALUES('$username','$pwd','$email', '$phone_number')");

if ($inserted) {
    echo "Record inserted successfully<br>";
} else {
    echo "Error inserting record: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
?>
