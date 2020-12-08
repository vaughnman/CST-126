<?php echo "Got the Form";?><br>
<?php echo "First Name is " . $_POST["fname"]; ?><br>
<?php echo "Last Name is " . $_POST["lname"]; ?><br>
<?php 

//Directing the sql to the host

$link = mysqli_connect("localhost", "root", "root", "milestone1");
if($link === false) {
    die("ERROR: this is the cannot connect page. " . mysqli_connect_errno());
}

//connecting the HTML functions here

echo "we have connection! <br>";
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];

//Inserting data to the SQL

$sql = "INSERT INTO milestoneusers (FIRST_NAME, LAST_NAME, EMAIL, PASSWORD) VALUES
('$fname', '$lname', '$Email', '$Password')";

if(mysqli_query($link, $sql)) {
    echo "We got the records";
} else {
    echo "We have an error, couldn't execute $sql. " . mysqli_error($link);   
}

mysqli_close($link);

?>
<br> You are registered!<br>