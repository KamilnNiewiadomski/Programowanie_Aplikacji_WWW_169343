<?php
session_start();
function addToCard($id_prod, $ile_sztuk, $wielkosc)
{
//ustawienie licznika ilosci produktow w koszyku
if(!isset($_SESSION['count']))
{
	$_SESSION['count'] = 1;
}
else
{
	$_SESSION['count']++;
}
$nr = $_SESSION['count']; //nadanie numeru dla produktu w koszyku

//zapisanie danych produktow w tablicy 2 wymiarowej - reszte pobierzemy po id_prod z bazy
$prod[$nr]['id_prod'] = $id_prod;
$prod[$nr]['ile_sztuk'] = $ile_sztuk;
$prod[$nr]['wielkosc'] = $wielkosc;
$prod[$nr]['data'] = time();

//stworzenie dwuwymiarowej numeracji - dla jednowymiarowej tablicy
$nr_0=$nr.'_0';
$nr_1=$nr.'_1';
$nr_2=$nr.'_2';
$nr_3=$nr.'_3';
$nr_4=$nr.'_4';

//zapisanie w tablicy sesji danych produktow
$_SESSION[$nr_0] = $nr;
$_SESSION[$nr_1] = $prod[$nr]['id_prod'];
$_SESSION[$nr_2] = $prod[$nr]['ile_sztuk'];
$_SESSION[$nr_3] = $prod[$nr]['wielkosc'];
$_SESSION[$nr_4] = $prod[$nr]['data'];
}

function RemoveFromCard()
{
	if ($_SESSION['count'] == 1){
		unset($_SESSION['count']);
	}
	else{
		$_SESSION['count']--;
	}
unset($_SESSION[$nr_0]);
unset($_SESSION[$nr_1]);
unset($_SESSION[$nr_2]);
unset($_SESSION[$nr_3]);
unset($_SESSION[$nr_4]);
}

function ShowCard()
{
	echo $_SESSION[$nr_0];
	echo $_SESSION[$nr_1];
	echo $_SESSION[$nr_2];
	echo $_SESSION[$nr_3];
	echo $_SESSION[$nr_4];
	for($i = 0; $i < 10; $i++){
	echo $_SESSION[$nr_0];
	}
}
addToCard(1,1,1);
addToCard(1,1,1);
ShowCard();
ShowCard();
?>
