<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);

/* ustawianie id strony do pokazania (domyślnie 1) */
if(!($_GET['idp'])) $strona = 1;
else $strona = $_GET['idp'];

/* import łączenia się z bazą danych */
include 'cfg.php';

?>
<html>
<head>
<link rel="stylesheet" href="css/css.css">
<script src="js/kolorujtlo.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="js/timedate.js" type="text/javascript"></script>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="pl" />
<meta name="Author" content="Kamil Niewiadomski" />
<title>Komputer moją pasją</title>
</head>
<body onload="startclock()">
<div id="menu">
<h1 style="color: #000000;">
KOMPUTERY MOJĄ PASJĄ,<br>CZYLI RECENZJA KOMPUTERÓW
</h1>
<table class="podstr">
<tr>
<th><a href="index.php">STRONA GŁÓWNA</a></th>
<th><a href="index.php?idp=2">KONTAKT</a></th>
<th><a href="index.php?idp=3">SPLASH-SCREEN</a></th>
<th><a href="index.php?idp=4">FILMY</a></th>
<th><a href="index.php?idp=5">SKLEP Z KOMPUTERAMI</a></th>
<th><a href="admin/admin.php">PANEL CMS</a></th>
<!-- <th><a href="index.php?idp=6">PANEL CMS</a></th> -->
</tr>
</table>
<div id="zegarek">test</div>
<div id="data">test</div>
</div>
<?php
/* import funkcji pokazywania podstron */
include 'showpage.php';

/* Pokazywanie podstron poprzez podanie id i łącza z bazą */
echo PokazPodstrone($strona,$link);

if ($strona == 2)
{
/* Pobranie funkcji do pokazania formularzu z kontaktem */
include 'contact.php';
/* Pokazanie formularza kontaktowego */
Pokazkontakt();
}
else if ($strona == 5){
include 'category.php';

PokazKategorie($link, 0);

include 'product.php';

PokazProdukt($link, 0);

include 'cart.php';
session_start();
#echo $_SESSION['count'];
#echo $prod[$nr]['id_prod'];
ShowCard();
echo '
<center>
<table>
<form method="POST">
<tr>
<td>id produktu <input type="number" name="id"></td>
<td>ilosc <input type="number" name="ilosc"></td>
<td><input type="submit" value="dodaj"></td>
</tr>
</from>
</table>
';
echo $_POST['id'];
echo $_POST['ilosc'];
addToCard($_POST['id'], $_POST['ilosc'], $_POST['ilosc']);
echo $_SESSION[$nr_1];
echo $nr_1;
ShowCard();
}
/* Autorstwo projektu */
$nr_indeksu = '169343';
$nrGrupy = '3';

if ($strona == 2 || $strona == 5)
	echo '</div>';

echo 'Autor: Kamil Niewiadomski '.$nr_indeksu.' grupa '.$nrGrupy.'<br>';
?>
</body>
</html>
