<?php
	/* ustawienie loginu i hasła do roota */
	$login = 'root';
	$pass = 'root';
	
	/* ustawienie danych do łącza z bazą danych */
	$dbhost= 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$baza = 'moja_strona';
	
	/* Łącze do bazy danych */
	$link = mysqli_connect($dbhost,$dbuser,$dbpass);
	
	/* Jeżeli nie udało sie połączyć, przerwij łącze */
	if (!$link) echo '<b>przerwane połączenie </b>';
	
	/* Jeżeli bazy nie ma, zwrócić komunikat */
	if (!mysqli_select_db($link,$baza)) echo 'nie wybrano bazy';
?>
