<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
if($_GET['idp'] == '') $strona = 'html/glowna.html';
if($_GET['idp'] == 'podstrona1') $strona = 'html/lab1_1.html';
if($_GET['idp'] == 'podstrona2') $strona = 'html/lab1_2.html';
if($_GET['idp'] == 'podstrona3') $strona = 'html/lab1_3.html';
if($_GET['idp'] == 'podstrona4') $strona = 'html/lab1_4.html';
if($_GET['idp'] == 'podstrona5') $strona = 'html/lab1_5.html';
if(!(file_exists($strona))) $strona = 'html/glowna.html';

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
include $strona;
?>
<?php
$nr_indeksu = '169343';
$nrGrupy = '3';

echo 'Autor: Kamil Niewiadomski '.$nr_indeksu.' grupa '.$nrGrupy.'<br>';
?>
</body>
</html>
<!--
enzomind.com/files/uwm/wyklady/ProjAppWeb/lab1.pdf
-->