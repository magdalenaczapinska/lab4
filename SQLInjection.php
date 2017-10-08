<?php include ("config.php"); ?>

<!-- HEADER -->
      
<?php include("header.php"); ?>

<?php


@ $db = new mysqli('localhost', 'root', '', 'testinguser');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

if (isset($_POST['username'], $_POST['userpass'])) {

    $uname = mysqli_real_escape_string($db, $_POST['username']);
    
    $upass = sha1($_POST['userpass']);
    
    
    $query = ("SELECT * FROM user WHERE username = '{$uname}' "."AND userpass = '{$upass}'");
       
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    $totalcount = $stmt->num_rows();
    
    
    
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        
        if (isset($totalcount)) {
            if ($totalcount == 0) {
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
            } else {
                echo '<h2>Welcome! Correct password.</h2> <a href="fileUpload.php">Here is the link</a>';
            }
        }
        ?>
        <form method="POST" action="">
            <input type="text" name="username">
            <input type="password" name="userpass">
            <input type="submit" value="Go">
        </form>

    <ul id="images">
    <?php
    /*Added a loop that iterates through the img folder, and adds each element into the img list*/
    $dir = new DirectoryIterator("uploadedFiles");
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot()) {
          echo "<li><img src=\"uploadedFiles/" . $fileinfo->getFilename() . "\"></li>";
        }
    }
    ?>
  </ul>


    <?php include("footer.php"); ?>
      </div>
      </div>
    </body>
</html>
