<?php  
    require_once 'functions.php';
    
    $name = $_POST["name"];
    $title = $_POST["title"];
    $blogStory = $_POST["blogStory"];

    // Database connection
    $conn = dbConnect();

    // When post is pressed by user
    $sql = "INSERT INTO blogpost (AUTHOR_NAME, BLOG_TITLE, BLOG_TEXT)
    VALUES ('$name', '$title', '$blogStory')";
    
    // Check that information is not NULL
    if ($name == NULL) {
        
        echo nl2br("- Please enter the authors name.\n\n");
    }
    
    if ($title == NULL) {
        
        echo nl2br("- Please enter the Title of the post\n\n");
    }
    
    if ($blogStory == NULL) {
        
        echo nl2br("- Please enter the blog message\n\n");
    }
    
    // Check for error
    if (!($name == NULL || $title == NULL || $blogStory == NULL) && $conn->query($sql) === TRUE) {
        
        echo "New record successfully created";
    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
       
        
    $conn->close();
?>