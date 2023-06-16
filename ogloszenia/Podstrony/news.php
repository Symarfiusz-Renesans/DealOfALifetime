<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styld.css">
	<title>Deal of a Lifetime</title>
</head>
<body>

<?php
	$nazwa_serwera = "localhost";
	$uzytkownik = "root";
	$haslo = "";
	$nazwa_bazy = "ogloszenia";
	$polaczenie = mysqli_connect($nazwa_serwera, $uzytkownik, $haslo, $nazwa_bazy);


	if (!$polaczenie) {
	    die("Problem z połączeniem: " . mysqli_connect_error());
	}
?>

<header>
	<a href="../index.php">
		<img id="logo" src="../img/doal.png" alt="Deal of a Lifetime">
	</a>
</header>

<div class="menu">
	<ul>
		<a href="zycie.php" style="display: block;"><li>Życie Gwiazd</li></a>
		<a href="filmy.php" style="display: block;"><li>Filmy</li></a>
		<a href="sport.php" style="display: block;"><li>Sport</li></a>
		<a href="create.php" style="display: block;"><li>Stwórz Wiadomość</li></a>
		<a href="slajd.php" style="display: block;"><li>Galeria</li></a>
	</ul>
</div>

<section id="main">

<?php
$newestNews = 'SELECT * FROM `news` WHERE `idNews` = '.$_GET["id"];
$resultN = $polaczenie->query($newestNews);
if (mysqli_num_rows($resultN) > 0) {
    while($row = $resultN->fetch_assoc()) {
		echo '
				<h2 style="">'.$row["title"].'</h2>
				<a href="Podstrony/news.php?id='.$row["idNews"].'">
					<section class="infoContainer" style="margin-top: 0; height: auto">
						<div class="maindivNews">
							<image class="divimg" alt="'.$row["imageSrc"].'" src="../img/'.$row["imageSrc"].'">
						</div>
						<section>
							<p class="text" style="padding: 10px; background-color: #222F3D; color: white">'.$row["content"].'</p>
						</section>
					</section>
				</a>
				';
}} else {
	echo '
    		<p>Najwyraźniej wystąpił jakiś błąd! :(</p>';
		}
?>

</section>

</body>
</html>