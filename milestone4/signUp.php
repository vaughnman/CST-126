<?php
include 'myfuncs.php';

$link = dbConnect();
//Inserting a user creditials into database
$username = $_POST['Username'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$confirmPassword = $_POST['ConfirmPassword'];

$sql_user = "SELECT * FROM `users` WHERE `username`='$username'";
$sql_email = "SELECT * FROM `users` WHERE `email`='$email'";
$result_user = mysqli_query($link, $sql_user);
$result_email = mysqli_query($link, $sql_email);

//Error catchers for signups
if (mysqli_num_rows($result_user) > 0) {
    alert("Try a different Username");
} elseif (mysqli_num_rows($result_email) > 0) {
    alert("Try a different Email");
} elseif ($password != $confirmPassword) {
    alert("Passwords do not match.");
} else {
    $sql_register = "INSERT INTO `users` (username, email, password) VALUES('$username', '$email', '$password')";
    
    if (mysqli_query($link, $sql_register)) {
        include 'signUpResponse.php';
    } else {
       alert("ERROR: Not able to execute $sql_register." . mysqli_error($link));
    }
}

mysqli_close($link);

?>