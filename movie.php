<?php 
$name = $_GET["film"];
$filename = glob("moviedb/" . $_GET["film"] . "/*.*");
$moviename = file($filename[0]);
$overview = file($filename[2]);
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Rancid Tomatoes</title>
	<meta charset="utf-8">
		<link href="css/movie.css" type="text/css" rel="stylesheet">
	</head>

	<body>
		<div id="top">
			<img src="images/rancidbanner.png" alt="Rancid Tomatoes">
		</div>

		<h1><?= ( $moviename[0] ."(" . $moviename[1] .")" ) ?></h1>
		<div id="total">
		<div id="right">
			<img src= "<?= $filename[1] ?>" alt="general overview">

		<dl>
			<?php for ($i = 0; $i < count($overview); $i++) { 
			$a  = explode(":", $overview[$i]);	
			print "<dt> $a[0] </dt>";
			print "<dd> $a[1] </dd>";
		}?>
		</dl>
		</div>
		<div id="left">
		<div id="left1">
			<?php if ( (int) $moviename[2]>60) {?>
				<img src="images/freshlarge.png" alt="Fresh">
				<?php }else { ?>
					<img src="images/rottenlarge.png" alt="Rotten">
				<?php }?>
			<?= ( $moviename[2] . "%" ) ?>
		</div>
		<div id="left2">
			<?php for ($i = 3; $i <=(int) ((count($filename)+2)/2); $i++) {
				$review = file($filename[$i],FILE_IGNORE_NEW_LINES); 
				$pic=strtolower($review[1]) ?>
				<p class="quotes">
					<img src="<?="images/" . $pic . ".gif"?>" alt="<?= $pic ?>">
					<q><?= $review[0] ?></q>
				</p>
				<p>
					<img src="images/critic.gif" alt="Critic">
						<?= $review[2] ?><br>
						<?= $review[3] ?>
				</p>
			<?php } ?>
		</div>
	<div id="left3">
		<?php for ($i = (int) ((count($filename)+4)/2); $i <count($filename); $i++) {
				$review = file($filename[$i]); 
				$pic=strtolower($review[1]) ?>
				<p class="quotes">
					<img src="<?="images/" . $pic . ".gif"?>" alt="<?= $pic ?>">
					<q><?= $review[0] ?></q>
				</p>
				<p>
					<img src="images/critic.gif" alt="Critic">
						<?= $review[2] ?><br>
						<?= $review[3] ?>
				</p>
			<?php } ?>
			
			<div id="add">
				<a class="link" href="add_review_form.php?film=<?= $_GET["film"] ?>">ADD A REVIEW </a>
			</div>
	</div>
</div>
		<div id="bottom">(1-10) of 88</div>
</div>
	<div id="goback">
			<a href="home.php">
 			<img src="images/goback.png" alt="Rancid Tomatoes">
		</div>

</body></html>