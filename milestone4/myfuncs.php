<?php

function dbConnect() {
    $link = mysqli_connect("localhost", "root", "root", "blogproject");
    //I was not able to get my azure server to work properly, I will continue to mess around with it,
    //working with the azure I can see how many backend fuctions and tools there really is.
    //sadly looking for azure resources online are far and few between. 
    //here is the connection I attempted to build, I was able to initiate the database but 
    //setting up the server to run it from I had multible complcations with
    //$link = mysqli_connect("cst126blog.mysql.database.azure.com", "vaughnman", "Apassword1!", "blogusers");
    if (!$link) {
        die("ERROR: Could not connect." . mysqli_connect_error());
    }
    return $link;
}

//Everyone loves getters and setters
function saveUserId($id) {
    session_start();
    $_SESSION["USER_ID"] = $id;
}
function getUserId() {
    session_start();
    return $_SESSION["USER_ID"];
}
function saveUsername($Username) {
    session_start();
    $_SESSION["Username"] = $Username;
}
function getUserName() {
    session_start();
    return $_SESSION["Username"];
}
function alert($message) {
    echo "<script>alert('$message');</script>";
}

//I am working on the populate blog area, 
//the posts are showing up in the database but not very clean when shown on the site.
function populateBlog() {
    $link = dbConnect();
    
    $blogQuery = "SELECT * FROM `blogpost`";
    $result = mysqli_query($link, $blogQuery);
    echo "<div>";
    echo "<form>";
    echo "<h3>Recent Posts</h3>";
    echo "<table>";
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row["post_title"];
        $message = $row["post_message"];
        echo "<th>Title: " . $title . "</th><tr><td>" . $message . "</td></tr>";
    }
    echo "</table>";
    echo "</form>";
    echo "</div>";
}

//The way we make a blog post and submit it to the database to save all those thoughts
function postBlog() {
    $link = dbConnect();
    
    $BlogTitle = $_POST['BlogTitle'];
    $BlogMessage = $_POST['BlogMessage'];
    
    if (is_null($BlogTitle) || empty($BlogTitle)) {
        echo "What are we talking about?";
        return;
    } elseif (is_null($BlogMessage) || empty($BlogMessage)) {
        echo "Have something on your mind?";
        return;
    }
 
    $sqlPost = "INSERT INTO `blogpost` (post_title, post_message) VALUES('$BlogMessage', '$BlogTitle')";
    
    if (mysqli_query($link, $sqlPost)) {
        alert("Successfully uploaded message.");
    } else {
        echo "ERROR: Not able to execute $sqlPost." . mysqli_error($link);
    }
}

?>