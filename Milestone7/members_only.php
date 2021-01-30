<?php
    session_start();
    
?>
<html>
<head>

	<title>Write a Story</title>
</head>

<style type="text/css">
    a {
        text-decoration: none
    }
</style>

<style>
    <!-- Setting alternate styles for fonts-->
    p.serif {
      font-family: "Times New Roman", Times, serif;
    }
    
    p.sansserif {
      font-family: Arial, Helvetica, sans-serif;
    }
    
    p.normal {
      font-weight: normal;
    }
    
    p.thick {
      font-weight: bold;
    }
    
    p.center {
      text-align: center;
    }
    
    p.small {
      line-height: 0.8;
    }
    
    p.big {
      line-height: 1.8;
    }
    
    h1.center {
      text-align: center;
    }
    
    h1.serif {
      font-family: "Times New Roman", Times, serif;
    }
    
    h1.sansserif {
      font-family: Arial, Helvetica, sans-serif;
    }
    
    h1.small {
      line-height: 0.8;
    }
    
    h1.big {
      line-height: 1.8;
    }
    
    <!-- Setting style for input types and div-->
    input[type=text], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    input[type=submit] {
      width: 100%;
      background-color: #0073e6;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input[type=submit]:hover {
      background-color: #0066cc;
    }
    
    button[type=button] {
      width: 100%;
      background-color: #0073e6;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    button[type=button]:hover {
      background-color: #0066cc;
    }
    
    a.button {
      width: 100%;
      font-family: Arial, Helvetica;
      background-color: #0073e6;
      color: white;
      padding: 14px 140px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    a.button:hover {
      background-color: #0066cc;
    }
    
    div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
</style>

<body background="bg2.jpg">
	
	<div>
		<h1 class="sansserif center small">Welcome to The Blog.</h1>
		<p class="sansserif center small">Write whats on your mind for the readers<p>

    	<?php 
        	// Check the session variable for user info
        	if (isset($_SESSION['valid_user'])) {
        	    
        	    echo '<p>Welcome '.$_SESSION['valid_user'].'</p>';
        	}
        	else {
        	    
        	    echo '<p>Please try loging in.</p>';
                echo '<p>Please try loging in to see this</p>';
        	}
    	?>
	
		<a class="button" href="homePage.php">Back to Home Page</a><br><br>
	</div>
	
	<br><br><br>
	
	<div>
		<h2>Write A Blog Post Here</h2>
		<form method="post">
    		Authors Name:<br>
    		<input type="text" name="name"><br>
    		Post Title:<br>
    		<input type="text" name="title"><br>
    		Your Blog Post:<br>
    		<textarea name="blogStory" cols="100" rows="40" placeholder="Whats on your mind..."></textarea><br><br>
    		<input type="submit" formaction="postHandler.php" name="post" value="Post Story">
		</form>
	</div>
	
</body>
</html>