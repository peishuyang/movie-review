<?php 
$filename = glob("moviedb/*/info.txt");
?>
<html>
	<head>
		<title>Rancid Tomatoes</title>

		<meta charset="utf-8" />
		<link href="css/home.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="banner">
			<img src="images/rancidbanner.png" alt="Rancid Tomatoes" />
		</div>

		<h1>Movie reviews</h1>
		
<div id="content">
	<ul>
		<?php for($i=0;$i<count($filename);$i++){ ?>
		<li>
			<?php $moviename = file($filename[$i]);
			if((int) $moviename[2]>60){?>
			<img src="images/freshlarge.png" alt="Rancid Tomatoes" />
			<?php }else{ ?>
			<img src="images/rottenlarge.png" alt="Rancid Tomatoes" />
			<?php } 
			$moviex = explode("/", $filename[$i]) ?>
			<a class="link" href="movie.php?film=<?= $moviex[1] ?>"><?= $moviename[0] ?></a>
		</li>
		<?php } ?>		
	</ul>
	
</div>
<div id="add">
	<a class="link" href="add_movie_form.php">ADD A MOVIE</a>
</div>
<div id="footer">
	 2015 &copy; Rancid Tomatoes <img src="images/fresh.gif" alt="Fresh" />
</div>
	
	</body>
</html>
