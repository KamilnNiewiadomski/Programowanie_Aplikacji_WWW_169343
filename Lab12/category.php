<?php
/* Dodaje kategorie */
function DodajKategorie($link,$id, $matka, $nazwa)
{
        /* zapytanie */
        $query = "INSERT INTO `category` (`id`, `matka`, `nazwa`) VALUES ('$id', '$matka', '$nazwa')";
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Usuwa kategorie */
function UsunKategorie($link,$id)
{
        /* zapytanie */
	$query = "DELETE FROM `category` WHERE `category`.`id` = '$id' LIMIT 1";
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Edytuje kategorie */
function EdytujKategorie($link,$id, $matka, $nazwa)
{
        /* zapytanie */
	$query = "UPDATE `category` SET `matka` = '$matka', `nazwa` = '$nazwa' WHERE `category`.`id` = '$id' LIMIT 1";
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Pokazuje kategorie */
function PokazKategorie($link, $filtr)
{
        /* zapytanie */
        $query="SELECT * FROM category WHERE `matka` = $filtr";
        /* wynik */
        $result = mysqli_query($link,$query);
        /* wyświetlenie wyniku */
        while($row = mysqli_fetch_array($result))
	{
		echo $row[0];
		for ($i = 1; $i <= count($row); $i++){
		echo ' '.$row[$i];
		}
                echo ' <br />';
		PokazKategorie($link, $row['id']);
        }
}

include 'cfg.php';
#include 'showpage.php';
#UsunKategorie($link,5);
#DodajKategorie($link, 5, 0, 'tttt');
#EdytujKategorie($link, 2, 0, 'tt');
#PokazKategorie($link, 0);
#echo PokazPodstrone(1,$link);
?>
