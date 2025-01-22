<?php
/* Pokaż formularz logownia */
function FormularzLogowania()
{
	echo '
	<div class="logowanie">
	<h1 class="heading">Panel CMS</h1>
	<div class="logowanie">
	<form method="POST" name="LoginForm" enctype="multipart/form-data">
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
	$query="SELECT * FROM `page_list`";
	/* wynik */
	$result = mysqli_query($link,$query);
	/* wyświetlenie wyniku */
	while($row = mysqli_fetch_array($result))
	{
		echo $row['id'].' '.$row['page_title'].' <br />';
	}
}
/* Edytuj podstronę poprzez pokazywany formularz (wymaga podania łącza z bazą danych i id usuwanej podstrony)*/
function EdytujPodstrone($link, $id, $tytul, $tresc, $status)
{
	/* zapytanie */
	$query = "UPDATE `page_list` SET `page_title` = '$tytul', `page_content` = '$tresc', `status` = '$status' WHERE `page_list`.`id` = '$id'";
	#$query="UPDATE `page_list` SET `page_list`.`page_title`='$title', `page_list`.`page_content`='$content', `page_list`.`status`='$status' WHERE `page_list`.`id` = $id LIMIT 1";
	/* wysłanie zapytania */
	mysqli_query($link,$query);
}
/* Dodaje nową podstronę poprzez pokazywany formularz (wymaga podania łącza z bazą danych)*/
function DodajPodstrone($link, $id, $tytul, $tresc, $status)
{
	/* zapytanie */
	$query="INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES ('$id', '$tytul', '$tresc', '$status')";
	/* wysłanie zapytania */
	mysqli_query($link,$query);
}

/* Usuwa podstronę o podanym id */
function UsunPodstrone($link, $id)
{
	/* zapytanie */
	$query="DELETE FROM `page_list` WHERE `page_list`.`id` = '$id' LIMIT 1";
	#$query="DELETE * FROM `page_list` WHERE `page_list`.`id`='$id' LIMIT 1";
	/* wysłanie zapytania */
	mysqli_query($link,$query);
}

/* łącze z bazą danych */
include '../cfg.php';
if (!isset($_SESSION))
session_start();
#$_SESSION['admin'] = 0;

/* jeżeli formularz logowanie jest pusty, nie wyświetlaj podanych wartości */
#if (!(empty($_POST['login_email'])) && !(empty($_POST['login_pass'])) && $_POST['login_email'] == $login && $_POST['login_pass'] == $pass){ $_SESSION['admin'] = true; echo $_SESSION['admin']; header("Refresh:0");}


#echo isset($_SESSION['admin']);
#echo $_SESSION['admin'];

include '../contact.php';
include '../category.php';
include '../product.php';
#include '../cart.php';

if (($_POST['login_email'] == $login && $_POST['login_pass'] == $pass) || $_SESSION['admin'] == 1)
{
	$_SESSION['admin'] = 1;


/* formularz kontaktowy */
#WyslijMailKontakt('169343@student.uwm.edu.pl');
	#ListaPodstron($link);
	#echo '<br>';
	#EdytujPodstrone($link, 5);

#print_r($_SESSION);
#print_r($_POST);

ListaPodstron($link);
echo '
<center>
<table>
<form method="POST" name="podstrony">
<tr>
<td>akcja:   <input type="radio" name="akcja_pod" value="1" checked="checked">dodaj</td>
<td><input type="radio" name="akcja_pod" value="2">edytuj</td>
<td><input type="radio" name="akcja_pod" value="3">usuń</td>
<td><input type="submit" value="zatwierdź" name="pod_sub"></td>
</tr>
<tr>
<td>id: <input type="number" name="id_str"></td>
<td>tytuł: <input type="text" name="tytul_str"></td>
<td>treść: <input type="text" name="tresc_str"></td>
<td>status: <input type="number" name="status_str"></td>
</tr>
</form>
</table>
</center>
';
switch ($_POST['akcja_pod']){
case 1:
        header("Refresh:0");
        #if ($_POST['id'] AND $_POST['matka'] AND $_POST['text'])
                DodajPodstrone($link, $_POST['id_str'], $_POST['tytul_str'], $_POST['tresc_str'], $_POST['status_str']);
        break;
case 2:
        header("Refresh:0");
        #if ($_POST['id'] AND $_POST['matka'] AND $_POST['text'])
EdytujPodstrone($link, $_POST['id_str'], $_POST['tytul_str'], $_POST['tresc_str'], $_POST['status_str']);
        break;
case 3:
        header("Refresh:0");
        #if ($_POST['id'] AND $_POST['text'])
                UsunPodstrone($link, $_POST['id_str']);
        break;
}

PokazKategorie($link, 0);
echo '
<center>
<table>
<form method="POST" name="kategoria">
<tr>
<td>akcja:   <input type="radio" name="akcja_kat" value="1" checked="checked">dodaj</td>
<td><input type="radio" name="akcja_kat" value="2">edytuj</td>
<td><input type="radio" name="akcja_kat" value="3">usuń</td>
<td><input type="submit" value="zatwierdź" name="kat_sub"></td>
</tr>
<tr>
<td>id: <input type="number" name="id_kat"></td>
<td>matka: <input type="number" name="matka_kat"></td>
<td>nazwa: <input type="text" name="text_kat"></td>
</tr>
</form>
</table>
</center>
';
switch ($_POST['akcja_kat']){
case 1:
        header("Refresh:0");
        echo "dodaje";
        #if ($_POST['id'] AND $_POST['matka'] AND $_POST['text'])
                DodajKategorie($link, $_POST['id_kat'], $_POST['matka_kat'], $_POST['text_kat']);
        break;
case 2:
        header("Refresh:0");
echo "edytuje";
        #if ($_POST['id'] AND $_POST['matka'] AND $_POST['text'])
                EdytujKategorie($link, $_POST['id_kat'], $_POST['matka_kat'], $_POST['text_kat']);
        break;
case 3:
        header("Refresh:0");
echo "usuwam";
        #if ($_POST['id'] AND $_POST['text'])
                UsunKategorie($link, $_POST['id_kat']);
        break;
}

PokazProdukt($link);

echo '
<center>
<table>
<form method="POST" name="produkt">
<tr>
<td>akcja:   <input type="radio" name="akcja" value="1" checked="checked">dodaj</td>
<td><input type="radio" name="akcja" value="2">edytuj</td>
<td><input type="radio" name="akcja" value="3">usuń</td>
<td><input type="submit" value="zatwierdź" name="prod_sub"></td>
</tr>
<tr>
<td>id <input type="number" name="id_prod"></td>
<td>tytul <input type="text" name="tytul"></td>
<td>opis <input type="text" name="opis"></td>
</tr><td>data utworzenia <input type="date" name="data_utworzenia"></td>
<td>data modyfikacji <input type="date" name="data_modyfikacji"></td>
<td>data wygasniecia <input type="date" name="data_wygasniecia"></td>
</tr><td>cena netto <input type="number" name="cena_netto"></td>
<td>podatek vat <input type="number" name="podatek_vat"></td>
<td>ilosc dostepnych sztuk <input type="number" name="ilosc_dostepnych_sztuk"></td>
</tr><td>status dostepnosci <input type="number" name="status_dostepnosci"></td>
<td>kategoria <input type="text" name="kategoria"></td>
<td>gabaryt produktu <input type="number" name="gabaryt_produktu"></td>
<td>zdjecie <input type="text" name="zdjecie"></td>
</tr>
</form>
</table>
';
switch ($_POST['akcja']){
case 1:
        header("Refresh:0");
	DodajProdukt($link, $_POST['id_prod'], $_POST['tytul'], $_POST['opis'], $_POST['data_utworzenia'], $_POST['data_modyfikacji'], $_POST['data_wygasniecia'], $_POST['cena_netto'], $_POST['podatek_vat'], $_POST['ilosc_dostepnych_sztuk'], $_POST['status_dostepnosci'], $_POST['kategoria'], $_POST['gabaryt_produktu'], $_POST['zdjecie']);
        break;
case 2:
        header("Refresh:0");
echo "edytuje";
	EdytujProdukt($link, $_POST['id_prod'], $_POST['tytul'], $_POST['opis'], $_POST['data_utworzenia'], $_POST['data_modyfikacji'], $_POST['data_wygasniecia'], $_POST['cena_netto'], $_POST['podatek_vat'], $_POST['ilosc_dostepnych_sztuk'], $_POST['status_dostepnosci'], $_POST['kategoria'], $_POST['gabaryt_produktu'], $_POST['zdjecie']);
        break;
case 3:
        header("Refresh:0");
echo "usuwam";
                UsunProdukt($link, $_POST['id_prod']);
        break;

}

}
else
{
	echo FormularzLogowania();
	/* Pobieranie funkcji do formularza kontaktowego */
	#Pokazkontakt();
	echo 'Przypomnij hasło<br>';
	PrzypomnijHaslo('169343@student.uwm.edu.pl');
}
echo '
<th><a href="../index.php">STRONA GŁÓWNA</a></th>
';
?>
