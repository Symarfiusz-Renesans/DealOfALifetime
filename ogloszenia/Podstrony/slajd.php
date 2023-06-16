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

	$arrSize = 0;
	$imgId;
	$obrazki;
	$newestNews = "SELECT * FROM `news`";
		$resultN = $polaczenie->query($newestNews);
		if (mysqli_num_rows($resultN) > 0) {
		    while($row = $resultN->fetch_assoc()) {
					$obrazki[$arrSize] = '../img/'.$row["imageSrc"].'"';
					$imgId[$arrSize] = $row["idNews"];
					$arrSize++;
	    }}
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
	<h2>Galeria</h2>
	<?php
		for($i = 0; $i < $arrSize; $i++){
			echo '
			<a href="news.php?id='.$imgId[$i].'">
				<section>
					<img class="mySlides headimg" src="'.$obrazki[$i].'">
				</section>		
			</a>
			';
		}
	?>
	

	
<script type="text/javascript">
	var numerZdjecia = 0;
slajder();
function slajder(){
  var img = document.getElementsByClassName("mySlides");
  for (var i = 0; i < img.length; i++) {
    img[i].style.display = "none";
  }
  numerZdjecia++;
  if(numerZdjecia > img.length){
    numerZdjecia = 1;
  }
  img[numerZdjecia-1].style.display = "block";
  setTimeout("slajder()", 3000);
}
</script>
</body>
</html>