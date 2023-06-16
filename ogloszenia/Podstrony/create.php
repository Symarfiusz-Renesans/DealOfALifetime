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
	mysqli_set_charset($polaczenie, "utf8");

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
	<section>
		<h2>Stwórz wiadomość</h2>
		<form action="upload.php" method="post" class="flexbox" enctype="multipart/form-data">
			<section>
				<label>Tytuł</label><br><input type="text" name="title" max="30" required><br>
				<label>Zawartość</label><br><textarea class="text" type="textarea" rows=10 cols=100 name="content" max="1000" required></textarea><br>
				<label>Zdjęcie</label><br><input type="file" name="img" required><br>
				<label>Typ Wiadomości</label><br><select name="typ" required>
					<option value="" disabled selected>Wybierz opcje</option>
					<option value="1">Zycie Gwiazd</option>
					<option value="2">Sport</option>
					<option value="3">Filmy</option>
				</select><br>
				<section class="flexbox">
					<button type="submit" name="submit" class="orangeButton">WYŚLIJ</button>
				</section>
			</section>
		</form>
	</section>
</section>

</body>
</html>