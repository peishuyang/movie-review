

<?php
$folder = glob("moviedb/*");

$num= count($folder) + 1;

mkdir("moviedb/movie" . $num);

move_uploaded_file($_FILES["info"]["tmp_name"], "moviedb/movie" . $num . "/info.txt");
move_uploaded_file($_FILES["overview"]["tmp_name"], "moviedb/movie" . $num . "/overview.txt");
move_uploaded_file($_FILES["image"]["tmp_name"], "moviedb/movie" . $num. "/overview.png");
move_uploaded_file($_FILES["review1"]["tmp_name"], "moviedb/movie" . $num. "/review1.txt");

$i=2;

while(is_uploaded_file($_FILES["review" . $i]["tmp_name"])){
	move_uploaded_file($_FILES["review" . $i]["tmp_name"], "moviedb/movie" . $num . "/review" . $i .".txt");
	$i++;
} 

include("home.php");

?>