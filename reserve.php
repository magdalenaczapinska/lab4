<?php include ("config.php"); ?>


<!-- HEADER -->
      
<?php include("header.php"); ?>
        
<!-- MAIN COLUMN -->

      <div id="bodycontent">
        <div id="columnswrapper">
          <div id="maincolumn">


    <?php


          $bookid = trim($_GET['ISBN']);
        echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';

$bookid = trim($_GET['ISBN']);      // From the hidden field
$bookid = addslashes($bookid);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
   echo "You are reserving book with the ISBN:"           .$bookid;

    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE Book SET onloan=1 WHERE ISBN = ?");
    $stmt->bind_param('i', $bookid);
    $stmt->execute();
    printf("<br>Book Reserved!");
    printf("<br><a href=browsebooks.php>Search and Book more Books </a>");
    printf("<br><a href=mybooks.php>Return to Reserved Books </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;

    ?>

          </div>

 <!-- SIDE COLUMN -->

      <div id="sidecolumn">
          <h3>
            Any questions?
          </h3>
          <h4 id="address">
            Corresponding address
          </h4>
          <p>
            Östra Storgatan 24<br>63 783 Jönköping
          </p>
          <h4 id="address">
            Telephone
          </h4>
          <p>
            +46 (0) 703 993 234
          </p>
          <h3 id="better">
            Let us be even better! Tell us what you think about our website and suggest some new solutions and ideas!
          </h3>
      </div>
        </div>

<!-- FOOTER -->

    <?php include("footer.php"); ?>
      </div>
      </div>
    </body>
</html>