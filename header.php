<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>The Book Club</title>
        <link href="index.css" type="text/css" rel="stylesheet">
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
          <script src="responsiveslides.min.js"></script>       
          <script>
            $(function() {
            $(".rslides").responsiveSlides();});
          </script>

    </head>
    <body>
  <div id="wrapper">
<header id="headercontent">
    <h1 id="headertext">
      The Book Club
    </h1>
        <nav id="topnav">
          <ul id="menuul">
            <a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php"> <li class="menuli">Home</li></a>
            <a class="<?php echo $current_page == 'aboutus.php' ? 'active' : NULL ?>" href="aboutus.php"> <li class="menuli">About Us</li></a>
            <a class="<?php echo $current_page == 'browsebooks.php' ? 'active' : NULL ?>" href="browsebooks.php"> <li class="menuli">Browse Books</li></a>
            <a class="<?php echo $current_page == 'mybooks.php' ? 'active' : NULL ?>" href="mybooks.php"> <li class="menuli">My Books</li></a>
            <a class="<?php echo $current_page == 'gallery.php' ? 'active' : NULL ?>" href="SQLInjection.php"> <li class="menuli">Gallery</li></a>
            <a class="<?php echo $current_page == 'contact.php' ? 'active' : NULL ?>" href="contact.php"> <li class="menuli">Contact</li></a> 
          </ul>
        </nav>
</header>