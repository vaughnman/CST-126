<?php
    $username = $_POST['USERNAME'];
    $password = $_POST['PASSWORD'];
    
    //Connecting database
    $link = mysqli_connect("localhost", "root", "root", "milestone22");
    if (mysqli_connect_errno()) {
        die('Connection Error: ('.mysqli_connect_errno().') '.mysqli_connect_error());
    } else {

    }
    
    //cannot have blank line
    if ($username == NULL) {
        echo nl2br("- Please enter a Username\n\n");
    }
    if ($password == NULL) {
        echo nl2br("- Please enter a Password\n\n");
    }
    
    // logining in based on user in database
    $query = "SELECT USERNAME, PASSWORD FROM blogusers WHERE USERNAME = $username AND PASSWORD = $password";
    $captured = $link->query($query);
    if($captured->num_rows == 1) {
        echo "Login Successfull!";
    } else if ($captured->num_rows == 0) {
            echo "Login Failed";
    } else if ($captured->num_rows > 2) {
        echo "More than one user is registered under this name.";
    } else {
        echo $link->error;
    }
    
    mysqli_close($link);
?>
    
        