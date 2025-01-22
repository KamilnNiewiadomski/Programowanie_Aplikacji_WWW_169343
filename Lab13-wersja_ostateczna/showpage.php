<?php
/* Pokazuje podstrony z z id podanym w argumentach, wymaga podania linka do bazy */
function PokazPodstrone($id,$link)
{
	//czyscimy $id, aby przez GET ktoś nie próbował wykonać ataku SQL INJECTION
	$id_clear = htmlspecialchars($id);
	
	/* zapytanie */
	$query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
	
	/* wynik zapytania */
	$result = mysqli_query($link,$query);
	$row = mysqli_fetch_array($result);
	
	//wywoływanie strony z bazy
	if (empty($row['id']))
	{
		$web = '[nie_znaleziono_strony]';
	}
	else
	{
		$web = $row['page_content'];
	}
/* Zwróć wybraną podstronę */
return $web;
}
?>