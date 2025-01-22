<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);

session_start();

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
<?php
#for ($i = 1; $i <= 5; $i++)
#echo '<th><a href="index.php?idp=$i">$tytul</a></th>';
?>
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

echo "<h1 style='color:black'>DOSTĘPNE KATEGORIE</h1>";
PokazKategorie_sklep($link, 0, 0);

include 'product.php';

echo "<h1 style='color:black'>DOSTĘPNE KOMPUTERY</h1>";
#if (!isset($_POST['filtr']) || $_POST['filtr'] == NULL)
#$_POST['filtr'] = '';
echo '
<form method="POST" name="filtr" action="index.php?idp=5">
Wybierz kategorię: <input type="text" name="filtr" value="">
<input type="submit" value="Filtruj">
</form>';
PokazProdukt_sklep($link, $_POST['filtr']);

include 'cart.php';
#if($_SESSION['count'] == 3)
#	RemoveFromCard();
#EditCard(2, 2, 8, 9);

#print_r(PokazProdukt_id($link, 2));
#echo PokazProdukt_id($link, 2)['tytul'];

#print_r($_SESSION);
#print_r($_POST);

echo '<h1 style="color:black;">KOSZYK</h1>
<form method="POST" name="koszyk" action="index.php?idp=5">
id: <input type="number" name="id" >
ilość: <input type="number" name="ilosc" value="1">
<input type="submit" value="Dodaj do koszyka">
<br>
akcja:   <input type="radio" name="akcja_kosz" value="1" checked="checked">dodaj
<input type="radio" name="akcja_kosz" value="2">edytuj
<input type="radio" name="akcja_kosz" value="3">usuń
</form>
';

switch ($_POST['akcja_kosz']){
case 1:
        #header("Refresh:0");
	if ($_POST['id'] != '' && $_POST['ilosc'] >= 1)
	AddToCard($link, $_POST['id'], $_POST['ilosc']);
        break;
case 2:
        #header("Refresh:0");
        #if ($_POST['id'] AND $_POST['matka'] AND $_POST['text'])
	EditCard($_POST['id'], $_POST['ilosc']);
        break;
case 3:
        #header("Refresh:0");
        #if ($_POST['id'] AND $_POST['text'])
	RemoveFromCardById($_POST['id']);
        break;
}



#$_SESSION['nr_2'] = $_SESSION['nr_1'];
ShowCard($link);

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
