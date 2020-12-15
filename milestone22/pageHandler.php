<?php
    $firstname = $_POST['FIRST_NAME'];
    $lastname = $_POST['LAST_NAME'];
    $username = $_POST['USERNAME'];
    $password = $_POST['PASSWORD'];
            
    $link = mysqli_connect("localhost", "root", "root", "milestone22");
    if (mysqli_connect_errno()) {
        die('Connection Error: ('.mysqli_connect_errno().') '.mysqli_connect_error());
    } else {
        echo "Your first name of: ".$_POST["FIRST_NAME"]. " and last name of: ".$_POST["LAST_NAME"]."<br>";
    }
        
    $query = "INSERT INTO blogusers (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD) VALUES ('$firstname', '$lastname', '$username', '$password')";
    if (mysqli_query($link, $query)) {
        echo "New First, Last name, username and password recorded successfully!"."<br>";
    } else {
        echo "Error: ".$query."<br>".mysqli_errno($link);
    }
    if ($firstname == NULL) {
        echo nl2br("- PLease enter your first name\n\n");
    }
    if ($lastname == NULL) {
        echo nl2br("- PLease enter your last name\n\n");
    }
    if ($username == NULL) {
        echo nl2br("- PLease enter a Username\n\n");
    }
    if ($password == NULL) {
        echo nl2br("- PLease enter a Password\n\n");
    }
    
    if (!($firstname == NULL || $lastname == NULL || $username == NULL || $password == NULL) && $link->query($query) == true) {
        echo "New user added successfully!";
    } else {
        echo "Error: ".$query."<br>".$link->error;
    }
    
    mysqli_close($link);
    
    
?>
