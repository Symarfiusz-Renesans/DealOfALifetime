<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styld.css">
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
	<img id="logo" src="img/doal.png" alt="Deal of a Lifetime">

</header>

<div class="menu">
	<ul>
		<a href="Podstrony/zycie.php" style="display: block;"><li>Życie Gwiazd</li></a>
		<a href="Podstrony/filmy.php" style="display: block;"><li>Filmy</li></a>
		<a href="Podstrony/sport.php" style="display: block;"><li>Sport</li></a>
		<a href="Podstrony/create.php" style="display: block;"><li>Stwórz Wiadomość</li></a>
		<a href="Podstrony/slajd.php" style="display: block;"><li>Galeria</li></a>
	</ul>
</div>

<section id="main">
	<h2>Najnowsze Informacje</h2>
	<?php
		$newestNews = "SELECT * FROM `news` ORDER BY `idNews` DESC LIMIT 5";
		$resultN = $polaczenie->query($newestNews);
		if (mysqli_num_rows($resultN) > 0) {
		    while($row = $resultN->fetch_assoc()) {
				echo '
				<a href="Podstrony/news.php?id='.$row["idNews"].'">
					<section class="infoContainer">
						<div class="maindiv">
							<image class="divimg" alt="'.$row["imageSrc"].'" src="img/'.$row["imageSrc"].'">
						</div>
						<section>
							<h3 class="text">'.$row["title"].'</h3>
							<p class="text">'.substr($row["content"], 0, 500).'...</p>
						</section>
					</section>
				</a>
				';
	    }} else {
    		echo "<p>Żadnych informacji!</p>";
		}
	?>

	<section class="insection">
		<h2>Czy masz jakąś ciekawą informację?<br>Podziel się!</h2>
		<div class="maindiv">
			<img src="img/maszynadp.png" alt="createNews" class="divimg">
		</div>
		<section class="mainsection">
			<a href="Podstrony/create.php" class="orangeButton">Stwórz Wiadomość!</a>
		</section>
</section>

</body>
</html>