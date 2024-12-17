<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);

/* ustawianie id strony do pokazania (domyślnie 1) */
if(!($_GET['idp'])) $strona = 1;
else $strona = $_GET['idp'];

/* import łączenia się z bazą danych */
include("./cfg.php");

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
<th><a href="index.php">POWRÓT</a></th>
<th><a href="index.php?idp=podstrona1">KONTAKT</a></th>
<th><a href="index.php?idp=podstrona2">SPLASH-SCREEN</a></th>
<th><a href="index.php?idp=podstrona3">FILMY</a></th>
<th><a href="index.php?idp=podstrona4">PODSTRONA1</a></th>
<th><a href="index.php?idp=podstrona5">PODSTRONA2</a></th>
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

/* Autorstwo projektu */
$nr_indeksu = '169343';
$nrGrupy = '3';

echo 'Autor: Kamil Niewiadomski '.$nr_indeksu.' grupa '.$nrGrupy.'<br>';

/* Pobranie funkcji do pokazania formularzu z kontaktem */
include 'contact.php';

/* Pokazanie formularza kontaktowego */
Pokazkontakt();
?>
</body>
</html>
