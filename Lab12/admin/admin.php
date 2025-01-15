<?php
/* Pokaż formularz logownia */
function FormularzLogowania()
{
	echo '
	<div class="logowanie">
	<h1 class="heading">Panel CMS</h1>
	<div class="logowanie">
	<form method="POST" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
	<table class="logowanie">
	<tr><td class="log4_t">[email]</td><td><input type="text" name="login_email" class="logowanie" /></td></tr>
	<tr><td>[haslo]</td><td><input type="password" name="login_pass" class="logowanie" /></td></tr>
	<tr><td>&nbsp</td><td><input type="submit" name="x1_submit" class="logowanie" value="zaloguj" /></td></tr>
	</table>
	</form>
	</div>
	</div>
	';
}
/* Pokaż id i nazwę podstron (wymaga podania łącza z bazą danych)*/
function ListaPodstron($link)
{
	/* zapytanie */
	$query="SELECT * FROM page_list";
	/* wynik */
	$result = mysqli_query($link,$query);
	/* wyświetlenie wyniku */
	while($row = mysqli_fetch_array($result))
	{
		echo $row['id'].' '.$row['page_title'].' <br />';
	}
}
/* Edytuj podstronę poprzez pokazywany formularz (wymaga podania łącza z bazą danych i id usuwanej podstrony)*/
function EdytujPodstrone($link, $id)
{
	/* formularz */
	echo '<div class="edytowanie">
	<form method="post" name="edycja" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
	<table class="edytowanie">
	<tr><td class="log4_t">tytuł</td><td><input type="text" name="tytul" class="edytowanie" /></td></tr>
	<tr><td>treść</td><td><textarea name="tresc" class="edytowanie"></textarea></td></tr>
	<tr><td>status</td><td><input type="checkbox" name="status" class="edytowanie" /></td></tr>
	<tr><td>&nbsp</td><td><input type="submit" name="x1_submit" class="edytowanie" value="wyślij" /></td></tr>
	</table>
	</form>
	</div>';
	/* pobranie danych */
	$title = $_POST['tytul'];
	$tresc = $_POST['tresc'];
	$status = $_POST['status'];
	/* zapytanie */
	$query="UPDATE page_list SET page_title='$title', page_content='$content', status='$status' LIMIT 1";
	/* wysłanie zapytania */
	mysqli_query($link,$query);
}
/* Dodaje nową podstronę poprzez pokazywany formularz (wymaga podania łącza z bazą danych)*/
function DodajNowaPodstrone($link)
{
	/* formularz */
	echo '<div class="edytowanie">
	<form method="post" name="edycja" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
	<table class="edytowanie">
	<tr><td class="log4_t">tytuł</td><td><input type="text" name="tytul" class="edytowanie" /></td></tr>
	<tr><td>treść</td><td><textarea name="tresc" class="edytowanie"></textarea></td></tr>
	<tr><td>status</td><td><input type="checkbox" name="status" class="edytowanie" /></td></tr>
	<tr><td>&nbsp</td><td><input type="submit" name="x1_submit" class="edytowanie" value="wyślij" /></td></tr>
	</table>
	</form>
	</div>';
	$title = $_POST['tytul'];
	$content =  $_POST['tresc'];
	$status = $_POST['status'];
	/* zapytanie */
	$query="INSERT INTO page_list VALUES ('$title', '$content', '$status') LIMIT 1";
	/* wysłanie zapytania */
	mysqli_query($link,$query);
}

/* Usuwa podstronę o podanym id */
function UsunPodstrone($link, $id)
{
	/* zapytanie */
	$query="DELETE * FROM page_list WHERE id='$id' LIMIT 1";
	/* wysłanie zapytania */
	mysqli_query($link,$query);
}

/* łącze z bazą danych */
include '../cfg.php';
session_start();
$_SESSION['admin'] = 0;

/* jeżeli formularz logowanie jest pusty, nie wyświetlaj podanych wartości */
#if (!(empty($_POST['login_email'])) && !(empty($_POST['login_pass'])) && $_POST['login_email'] == $login && $_POST['login_pass'] == $pass){ $_SESSION['admin'] = true; echo $_SESSION['admin']; header("Refresh:0");}

include '../contact.php';
include '../category.php';
include '../product.php';
#include '../cart.php';

echo isset($_SESSION['admin']);
echo $_SESSION['admin'];

if (!(empty($_POST['login_email'])) && !(empty($_POST['login_pass'])) && $_POST['login_email'] == $login && $_POST['login_pass'] == $pass && $_SESSION['admin'] != 1)
	{$_SESSION['admin'] = 1;}
else
{
	echo FormularzLogowania();
	/* Pobieranie funkcji do formularza kontaktowego */
	#Pokazkontakt();
	echo 'Przypomnij hasło<br>';
	PrzypomnijHaslo('169343@student.uwm.edu.pl');
#}
#if ($_SESSION['admin'] == 1){
#echo $_SESSION['admin']; 


/* formularz kontaktowy */
#WyslijMailKontakt('169343@student.uwm.edu.pl');
	ListaPodstron($link);
	echo '<br>';
	EdytujPodstrone($link, 5);
echo '
<center>
<table>
<form method="POST">
<tr>
<td>akcja:   <input type="radio" name="akcja_kat" value="1">dodaj</td>
<td><input type="radio" name="akcja_kat" value="2">edytuj</td>
<td><input type="radio" name="akcja_kat" value="3">usuń</td>
<td><input type="submit" value="zatwierdź"></td>
</tr>
<tr>
<td><input type="number" name="id"></td>
<td><input type="number" name="matka"></td>
<td><input type="text" name="text"></td>
</tr>
</from>
</table>
';

PokazKategorie($link, 0);
echo '
<center>
<table>
<form method="POST">
<tr>
<td>akcja:   <input type="radio" name="akcja_kat" value="1">dodaj</td>
<td><input type="radio" name="akcja_kat" value="2">edytuj</td>
<td><input type="radio" name="akcja_kat" value="3">usuń</td>
<td><input type="submit" value="zatwierdź"></td>
</tr>
<tr>
<td><input type="number" name="id"></td>
<td><input type="number" name="matka"></td>
<td><input type="text" name="text"></td>
</tr>
</from>
</table>
';
switch ($_POST['akcja_kat']){
case 1:
        echo "dodaje";
        #if ($_POST['id'] AND $_POST['matka'] AND $_POST['text'])
                DodajKategorie($link, $_POST['id'], $_POST['matka'], $_POST['text']);
        #header("Refresh:0");
        break;
case 2:
echo "edytuje";
        #if ($_POST['id'] AND $_POST['matka'] AND $_POST['text'])
                EdytujKategorie($link, $_POST['id'], $_POST['matka'], $_POST['text']);
        #header("Refresh:0");
        break;
case 3:
echo "usuwam";
        #if ($_POST['id'] AND $_POST['text'])
                UsunKategorie($link, $_POST['id']);
        #header("Refresh:0");
        break;
}

PokazProdukt($link);

echo '
<center>
<table>
<form method="POST">
<tr>
<td>akcja:   <input type="radio" name="akcja" value="1">dodaj</td>
<td><input type="radio" name="akcja" value="2">edytuj</td>
<td><input type="radio" name="akcja" value="3">usuń</td>
<td><input type="submit" value="zatwierdź"></td>
</tr>
<tr>
<td>id <input type="number" name="id"></td>
<td>tytul <input type="text" name="tytul"></td>
<td>opis <input type="text" name="opis"></td>
</tr><td>data utworzenia <input type="date" name="data_utworzenia"></td>
<td>data modyfikacji <input type="date" name="data_modyfikacji"></td>
<td>data wygasniecia <input type="date" name="data_wygasniecia"></td>
</tr><td>cena netto <input type="number" name="cena_netto"></td>
<td>podatek vat <input type="number" name="podatek_vat"></td>
<td>ilosc dostepnych sztuk <input type="number" name="ilosc_dostepnych_sztuk"></td>
</tr><td>status dostepnosci <input type="text" name="status_dostepnosci"></td>
<td>kategoria <input type="text" name="kategoria"></td>
<td>gabaryt produktu <input type="number" name="gabaryt_produktu"></td>
<td>zdjecie <input type="text" name="zdjecie"></td>
</tr>
</from>
</table>
';
switch ($_POST['akcja']){
case 1:
        echo "dodaje";
        #if ($_POST['id'] AND $_POST['matka'] AND $_POST['text'])
	DodajProdukt($link, 2, 'temp', 'opis', '2025-01-01', '2025-01-01', '2025-01-01', 123.0, 123.0, 1, 1, 'kategoria', 23, 'temp');
        header("Refresh:0");
        break;
case 2:
echo "edytuje";
        #if ($_POST['id'] AND $_POST['matka'] AND $_POST['text'])
	EdytujProdukt($link, 2, 'te1mp', 'opis', '2025-01-01', '2025-01-01', '2025-01-01', 123.0, 123.0, 1, 1, 'xdddkategoria', 23, 'temp');
        header("Refresh:0");
        break;
case 3:
echo "usuwam";
        #if ($_POST['id'] AND $_POST['text'])
                UsunProdukt($link, $_POST['id']);
        header("Refresh:0");
        break;
}

}

/* jeżeli formularz logowanie jest pusty, nie wyświetlaj podanych wartości */
#if (!(empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))){
#echo $_POST['temat'].$_POST['tresc'].$_POST['email'];
#}
#ListaPodstron($link);
#EdytujPodstrone($link, 0);
#DodajNowaPodstrone($link);
?>
