<?php
function namestr($int)
{
return 'nr_'.(string)$int;
}
function AddToCard($link, $id, $amount)
{
	if (PokazProdukt_id($link, $id)['id'] == $id)
	{
if(!isset($_SESSION[namestr(1)]))
{
	$_SESSION['count'] = 1;
	$_SESSION[namestr(1)] = [$id, $amount];
}
else
{
	$_SESSION['count'] += 1;
	$_SESSION[namestr($_SESSION['count'])] = [$id, $amount];
}
}
else
{
	echo "podanego produtku nie ma w bazie danych<br>";
}
}

function RemoveFromCard()
{
if(isset($_SESSION[namestr($_SESSION['count'])]))
{
	unset($_SESSION[namestr($_SESSION['count'])]);
	$_SESSION['count'] -= 1;
}
}

function RemoveFromCardById($id)
{
	$_SESSION[namestr($id)] = NULL;
}

function RemoveFromCardById1($id)
{
if(isset($_SESSION[namestr($_SESSION['count'])]))
{
	for($i = $_SESSION['count']; $i > $id; $i--)
	{
	$_SESSION[namestr($i-1)] = $_SESSION[namestr($i)];
	}
	}
	unset($_SESSION[namestr($_SESSION['count'])]);
	if ($_SESSION['count'] > 2)
	$_SESSION['count'] -= 1;
	else
		$_SESSION[namestr(1)] = NULL;
}

function EditCard($nr, $id, $amount)
{
	$_SESSION[namestr($nr)] = [$id,$amount];
}
include 'cfg.php';
#include 'product.php';
#PokazProdukt($link);
function ShowCard($link)
{
for ($i = 1; $i <= $_SESSION['count']; $i++)
{
if (isset($_SESSION[namestr($i)][0]))
echo 'Pozycja w koszyku: '.$i.', nazwa produktu: '.PokazProdukt_id($link, $_SESSION[namestr($i)][0])['tytul'].', do zapłaty: '.PokazProdukt_id($link, $_SESSION[namestr($i)][0])['cena_netto']*$_SESSION[namestr($i)][1] .'zł<br>';
}

}
?>
