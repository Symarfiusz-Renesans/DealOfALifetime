<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styld.css">
	<title>Deal of a Lifetime</title>
	<style>
		.custom-select {
		  position: relative;
		  font-weight: 700;
		}

		.custom-select select {
		  display: none; /*hide original SELECT element: */
		}

		.select-selected {
		  background-color: orange;
		}

		.select-selected:after {
		  position: absolute;
		  content: "";
		  top: 14px;
		  right: 10px;
		  width: 0;
		  height: 0;
		  border: 6px solid transparent;
		  border-color: #fff transparent transparent transparent;
		}

		.select-selected.select-arrow-active:after {
		  border-color: transparent transparent #fff transparent;
		  top: 7px;
		}

		.select-items div,.select-selected {
		  color: #ffffff;
		  padding: 8px 16px;
		  border: 1px solid transparent;
		  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
		  cursor: pointer;
		}

		.select-items {
 		  position: absolute;
		  background-color: orange;
		  top: 100%;
		  left: 0;
		  right: 0;
		  z-index: 99;
		}
		.select-hide {
		  display: none;
		}

		.select-items div:hover, .same-as-selected {
		  background-color: rgba(0, 0, 0, 0.1);
		}

		.dodMargin{
			margin-top:10px;
		}
	</style>
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
				<label>Typ Wiadomości</label><br><div class="custom-select dodMargin"><select name="typ" required>
					<option value="" disabled selected>Wybierz opcje</option>
					<option value="1">Zycie Gwiazd</option>
					<option value="2">Sport</option>
					<option value="3">Filmy</option>
				</select></div><br>
				<label>Tytuł</label><br><input type="text" name="title" max="30" required><br>
				<label>Zawartość</label><br><textarea class="text" type="textarea" rows=10 name="content" max="1000" required></textarea><br>
				<label>Zdjęcie</label><br><input type="file" name="img" id="img" class="custom-file-input" required><label class="zmylka" for="img">Wybierz zdjęcie</label><br>
				<section class="flexbox">
					<button type="submit" name="submit" class="orangeButton">WYŚLIJ</button>
				</section>
			</section>
		</form>
	</section>
</section>

<script>
var x, i, j, l, ll, selElmnt, a, b, c;
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

document.addEventListener("click", closeAllSelect);
</script>
</body>
</html>