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
	<h2>Najnowsze Informacje</h2>
	<?php
		$newestNews = "SELECT * FROM `news` WHERE `idContentType` = 3 ORDER BY `addDate` DESC";
		$resultN = $polaczenie->query($newestNews);
		if (mysqli_num_rows($resultN) > 0) {
		    while($row = $resultN->fetch_assoc()) {
				echo '
				<a href="news.php?id='.$row["idNews"].'">
					<section class="infoContainer">
						<div class="maindiv">
							<image class="divimg" alt="'.$row["imageSrc"].'" src="../img/'.$row["imageSrc"].'">
						</div>
						<section>
							<h3 class="text">'.$row["title"].'</h3>
							<p class="text">'.substr($row["content"], 0, 100).'...	</p>
						</section>
					</section>
				</a>
				';
	    }} else {
    		echo "<p>Żadnych informacji!</p>";
		}
	?>
</section>

</body>
</html>