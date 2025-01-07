<?php
/* Dodaje produkt */
function DodajProdukt($id, $tytul, $opis, $data_utworzenia, $data_modyfikacji, $data_wygasniecia, $cena_netto, $podatek_vat, $ilosc_sztuk, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie)
{
        /* zapytanie */
        query = 'INSERT INTO products VALUES('$id', '$tytul', '$opis', '$data_utworzenia',' $data_modyfikacji', '$data_wygasniecia', '$cena_netto', '$podatek_vat',' $ilosc_sztuk', '$status_dostepnosci', '$kategoria', '$gabaryt_produktu', '$zdjecie')';
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Usuwa produkt */
function UsunProdukt($id)
{
        /* zapytanie */
	$query="DELETE * FROM products WHERE id='$id' LIMIT 1";
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Edytuje produkt */
function EdytujProdukt($id, $tytul, $opis, $data_utworzenia, $data_modyfikacji, $data_wygasniecia, $cena_netto, $podatek_vat, $ilosc_sztuk, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie)
{
        /* zapytanie */
	$query="UPDATE products SET id='$id', tytul='$tytul', opis='$opis', data_utworzenia='$data_utworzenia', data_modyfikacji='$data_modyfikacji', data_wygasniecia='$data_wygasniecia', cena_netto='$cena_netto', podatek_vat='$podatek_vat', ilosc_sztuk='$ilosc_sztuk', status_dostepnosci='$status_dostepnosci', kategoria='$kategoria', gabaryt_produktu='$gabaryt_produktu', zdjecie='$zdjecie' WHERE id='$id' LIMIT 1";
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Pokazuje produkt */
function PokazProdukt($id)
{
        /* zapytanie */
        query = 'SELECT * FROM products';
        /* wynik */
        $results = mysqli_query($link,$query);
        /* wyświetlenie wyniku */
        while($row = mysqli_fetch_array($results))
        {
	/* wyświetlenie */
	echo $row['$id'].' '.$row['$tytul'].' '.$row['$opis'].' '.$row['$data_utworzenia'].' '.$row['$data_modyfikacji'].' '.$row['$data_wygasniecia'].' '.$row['$cena_netto'].' '.$row['$podatek_vat'].' '.$row['$ilosc_sztuk'].' '.$row['$status_dostepnosci'].' '.$row['$kategoria'].' '.$row['$gabaryt_produktu'].' '.$row['$zdjecie'].' <br />';
        }
}
?>
/*
CREATE TABLE . (uid=1000(uzytkownik) gid=1000(uzytkownik) groups=1000(uzytkownik) INT NOT NULL ,  VARCHAR NOT NULL ,  TEXT NOT NULL ,  DATE NOT NULL ,  DATE NOT NULL ,  DATE NOT NULL ,  FLOAT NOT NULL ,  FLOAT NOT NULL ,  INT NOT NULL ,  INT NOT NULL ,  INT NOT NULL ,  INT NOT NULL ,  BLOB NOT NULL ) ENGINE = InnoDB; 
CREATE TABLE `products`.`products` (`id` INT NOT NULL , `tytul` VARCHAR NOT NULL , `opis` TEXT NOT NULL , `data_utworzenia` DATE NOT NULL , `data_modyfikacji` DATE NOT NULL , `data_wygasniecia` DATE NOT NULL , `cena_netto` FLOAT NOT NULL , `podatek_vat` FLOAT NOT NULL , `ilosc_dostepnych_sztuk` INT NOT NULL , `status_dostepnosci` INT NOT NULL , `kategoria` INT NOT NULL , `gabaryt` INT NOT NULL , `zdjecie` BLOB NOT NULL ) ENGINE = InnoDB; 
*/
