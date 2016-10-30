


<?php

$key = $_GET["film"];

if(trim($_GET["review"]) == "" || trim($_GET["rating"]) == "" || trim($_GET["organization"]) == ""){
	include("add_review_error.php");
	die(0);
}

$filename = glob("moviedb/" . $_GET["film"] . "/review*.txt");
$reviewname= "moviedb/$key/review" . (count($filename)+1) . ".txt";

file_put_contents($reviewname, str_replace("\n", " ", $_GET["review"]) ."\n" . $_GET["rating"] ."\n" . $_GET["name"] ."\n" . $_GET["organization"]);

include("movie.php");

?>