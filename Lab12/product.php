<?php
/* Dodaje produkt */
function DodajProdukt($link,$id, $tytul, $opis, $data_utworzenia, $data_modyfikacji, $data_wygasniecia, $cena_netto, $podatek_vat, $ilosc_sztuk, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie)
{
        /* zapytanie */
        $query = "INSERT INTO `products` (`id`, `tytul`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`, `cena_netto`, `podatek_vat`, `ilosc_dostepnych_sztuk`, `status_dostepnosci`, `kategoria`, `gabaryt_produktu`, `zdjecie`) VALUES ('$id', '$tytul', '$opis', '$data_utworzenia',' $data_modyfikacji', '$data_wygasniecia', '$cena_netto', '$podatek_vat',' $ilosc_sztuk', '$status_dostepnosci', '$kategoria', '$gabaryt_produktu', '<img src=\"img/$zdjecie.jpg\" style=\" height: 50px; width: 50px;\" class=\"zdjsklep\">')";
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Usuwa produkt */
function UsunProdukt($link,$id)
{
        /* zapytanie */
	$query = "DELETE FROM `products` WHERE `products`.`id` = '$id' LIMIT 1";
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Edytuje produkt */
function EdytujProdukt($link,$id, $tytul, $opis, $data_utworzenia, $data_modyfikacji, $data_wygasniecia, $cena_netto, $podatek_vat, $ilosc_dostepnych_sztuk, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie)
{
        /* zapytanie */
	$query = "UPDATE `products` SET `tytul` = '$tytul', `opis` = '$opis', `data_utworzenia` = '$data_utworzenia', `data_modyfikacji` = '$data_modyfikacji', `data_wygasniecia` = '$data_wygasniecia', `cena_netto` = '$cena_netto', `podatek_vat` = '$podatek_vat', `ilosc_dostepnych_sztuk` = '$ilosc_dostepnych_sztuk', `status_dostepnosci` = '$status_dostepnosci', `kategoria` = '$kategoria', `gabaryt_produktu` = '$gabaryt_produktu', `zdjecie` = '$zdjecie' WHERE `products`.`id` = '$id' LIMIT 1";
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Pokazuje produkt */
function PokazProdukt($link)
{
        /* zapytanie */
        $query="SELECT * FROM products";
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
        }
}

#include 'cfg.php';
#include 'showpage.php';
#UsunProdukt($link,2);
#DodajProdukt($link, 2, 'temp', 'opis', '2025-01-01', '2025-01-01', '2025-01-01', 123.0, 123.0, 1, 1, 'kategoria', 23, 'budowa2');
#EdytujProdukt($link, 2, 'te1mp', 'opis', '2025-01-01', '2025-01-01', '2025-01-01', 123.0, 123.0, 1, 1, 'xdddkategoria', 23, 'temp');
#PokazProdukt($link);
#echo PokazPodstrone(1,$link);
#echo 'test';
?>
