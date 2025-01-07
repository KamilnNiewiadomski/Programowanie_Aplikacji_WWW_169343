<?php
/* Dodaje kategorie */
function DodajKategorie($id, $matka, $nazwa)
{
        /* zapytanie */
        query = 'INSERT INTO category VALUES('$id', '$matka', '$nazwa')';
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Usuwa kategorie */
function UsunKategorie($id)
{
        /* zapytanie */
	$query="DELETE * FROM category WHERE id='$id' OR matka='$id' LIMIT 1";
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Edytuje kategorie */
function EdytujKategorie($id, $matka, $nazwa)
{
        /* zapytanie */
	$query="UPDATE category SET matka='$matka', nazwa='$nazwa' WHERE id='$id' LIMIT 1";
        /* wynik */
        $results = mysqli_query($link,$query);
}
/* Pokazuje kategorie */
function PokazKategorie($id)
{
        /* zapytanie */
        query = 'SELECT * FROM category';
	temp = 0;
        query1 = 'SELECT * FROM category WHERE matka='temp'';
        /* wynik */
        $results = mysqli_query($link,$query);
        /* wyświetlenie wyniku */
        while($row = mysqli_fetch_array($results))
        {
		/* wyświetlenie jeżeli matka */
		if $row['matka'] == 0 {
                echo $row['id'].' '.$row['matka'].$row['nazwa'].' <br />';
		/* ustanowienie matki */
		temp = $row['matka'];
		/* zapytanie do bazy */
        	$resultss = mysqli_query($link,$query1);
		/* pętla wyświetlająca podkategorie */
		while($row = mysqli_fetch_array($resultss))
		{
                echo $row['id'].' '.$row['matka'].$row['nazwa'].' <br />';
		}
		}
        }
}
?>
