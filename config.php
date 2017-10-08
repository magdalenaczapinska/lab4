<?php

$url = $_SERVER['REQUEST_URI'];  	#giving the page youre on right now, the link

$strings = explode('/', $url);		#break the strings into chunks, slash is a dynamite(space), were breaking down the url we got in the first line ( were gonna 									get localhost, lab2, index.php - in individual section)

$current_page = end($strings); 		#this is gonna take the page youre on at the moment, show the last string of the url

$dbname = 'Books database';
$dbuser = 'root';
$dbpass = '';
$dbserver = 'localhost';

?>