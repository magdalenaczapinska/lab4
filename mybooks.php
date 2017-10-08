<?php include ("config.php"); ?>


<!-- HEADER -->
      
<?php include("header.php"); ?>
        
<!-- MAIN COLUMN -->

      <div id="bodycontent">  
        <div id="columnswrapper">
          <div id="maincolumn">



        <div class="container">

        <h3>My books:</h3>
          
          <?php
# This is the mysqli version

$searchtitle = "";
$searchauthor = "";

if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $searchtitle = trim($_POST['searchtitle']);
    $searchauthor = trim($_POST['searchauthor']);
}

//  if (!$searchtitle && !$searchauthor) {
//    echo "You must specify either a title or an author";
//    exit();
//  }

$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

# Build the query. Users are allowed to search on title, author, or both

$query = " select * from Book where onloan = 1";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . "and where Title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . "and where Author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . "and where Title like '%" . $searchtitle . "%' and Author like '%" . $searchauthor . "%'"; // unfinished
}

//echo "Running the query: $query <br/>"; # For debugging


  # Here's the query using an associative array for the results
//$result = $db->query($query);
//echo "<p> $result->num_rows matching books found </p>";
//echo "<table border=1>";
//while($row = $result->fetch_assoc()) {
//echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
//}
//echo "</table>";
 

# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
          $stmt = $db->prepare($query);
    $stmt->bind_result($ISBN, $Title, $Pages, $Edition, $Year, $Publishing, $Author, $onloan);
    $stmt->execute();
    
//    $stmt2 = $db->prepare("update onloan set 0 where bookid like ". $bookid);
//    $stmt2->bind_result($onloan, $bookid);
    

    echo '<table cellpadding="6">';
    echo '<tr><b><td>ISBN</td><b> <td>Title</td> <td>Author</td> <td>Reserved?</td> </b> <td>Return</td> </b></tr>';
    while ($stmt->fetch()) {
        if($onloan==1)
            $onloan="Yes";
       
        echo "<tr>";
        echo "<td> $ISBN </td><td> $Title </td><td> $Author </td><td> $onloan </td>";
        echo '<td><a href="returnBook.php?ISBN=' . urlencode($ISBN) . '">Return</a></td>';
        echo "</tr>";
        
    }
    echo "</table>";
    ?>





            
        </div>


            
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
