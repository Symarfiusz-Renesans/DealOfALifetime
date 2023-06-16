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
		$isUploaded = 0;

		$title = $_POST['title'];
		$content = $_POST['content'];
		$typ = $_POST['typ'];

		if(isset($_POST['submit'])){
			$img = $_FILES['img'];

			$imgName = $_FILES['img']['name'];
			$imgTmpName = $_FILES['img']['tmp_name'];
			$imgSize = $_FILES['img']['size'];
			$imgError = $_FILES['img']['error'];
			$imgType = $_FILES['img']['type'];

			$fileExt = explode('.', $imgName);
			$fileActualExt = strtolower(end($fileExt));

			$allowedExt = array('jpg', 'jpeg', 'png', 'gif');

			if(in_array($fileActualExt, $allowedExt)){
			if($imgError === 0){
					if($imgSize < 5000000){
						$imgNewName = uniqid('', true).".".$fileActualExt;
						$imgDestination = '../img/'.$imgNewName;
						move_uploaded_file($imgTmpName, $imgDestination);
					} else {
						echo "<p>Plik jest za duży (limit: 500 MG)</p>";
						$isUploaded++;
					}
				} else {
					echo "<p>An error occured, please try again</p>";
					$isUploaded++;
				}	
			} else {
				echo "<p>Nie możesz wysłać pliku o tym rozszerzeniu!</p>";
				echo "<p>Możesz jedynie wysłać: JPG, JPEG, PNG, GIF";
				$isUploaded++;
			}
		} else {
			$isUploaded++;
		}

		$newNews = 'INSERT INTO `news` (`title`, `content`, `imageSrc`, `idContentType`, `addDate`, `isPremium`)
					VALUES ("'.$title.'","'.$content.'","'.$imgNewName.'",'.$typ.',"'.date("d.m.Y").'", 0)';

		if ($polaczenie->query($newNews) === TRUE) {
		} else {
			echo "Error: " . $newNews . "<br>" . $polaczenie->error;
			$isUploaded++;
		}

		if ($isUploaded != 0) {
			echo "<p>Najwyraźniej poszło coś nie tak :(.</p>";
			echo '<a href="create.php" class="orangeButton">Spróbuj jeszcze raz!</a>';
			echo '<a href="../index.php" class="orangeButton">Powróć na Stronę Główną</a>';
		} else {
			echo "<p>Wiadomość dostarczona!</p>";
			echo '<a href="../index.php" class="orangeButton">Powróć na Stronę Główną</a>';
		}
	?>
</section>

</body>
</html>