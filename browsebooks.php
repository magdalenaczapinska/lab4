<?php include ("config.php"); ?>

<!-- HEADER -->
      
<?php include("header.php"); ?>
<div id="maincolumn">
<h3>Search our Book Catalog</h3>
<hr>

<form action="browsebooks.php" method="POST">
    <table cellpadding="20">
        <tbody>
            <tr>
                <td><h3>Title:</h3></td>
                <td><INPUT type="text" name="searchtitle"></td>
            </tr>
            <tr>
                <td><h3>Author:</h3></td>
                <td><INPUT type="text" name="searchauthor"></td>
            </tr>
            <tr>
                <td></td>
                <td><INPUT type="submit" name="submit" value="Submit"></td>
            </tr>
        </tbody>
    </table>
</form>

<h3>Book List</h3>

<?php
# This is the mysqli version

@ $db = new mysqli('localhost', 'root', '', 'Books database');

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

$searchtitle= htmlentities($searchtitle);
$searchauthor= htmlentities($searchauthor);

$searchtitle = mysqli_real_escape_string($db, $searchtitle);
$searchauthor = mysqli_real_escape_string($db, $searchauthor);

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

# Build the query. Users are allowed to search on title, author, or both

$query = " select * from Book";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " where Title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " where Author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " where Title like '%" . $searchtitle . "%' and Author like '%" . $searchauthor . "%'"; // unfinished
}

//echo "Running the query: $query <br/>"; # For debugging


# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($ISBN, $Title, $Pages, $Edition, $Year, $Publishing, $Author, $onloan);
    $stmt->execute();

    echo '<table cellpadding="6">';
    echo '<tr><b><td>Title</td> <td>Author</td> <td>Reserved?</td> <td>Reserve</td> </b> </tr> ';
    while ($stmt->fetch()) {

        if($onloan == 1)
          $onloan = "Yes";
        else {
          $onloan = "No";
        }

        echo "<tr>";
        echo "<td> $Title </td><td> $Author </td> <td> $onloan </td>";
        echo '<td><a href="reserve.php?ISBN=' . urlencode($ISBN) . '"> Reserve </a></td>';
        echo "</tr>";
    }
    echo "</table>";
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
