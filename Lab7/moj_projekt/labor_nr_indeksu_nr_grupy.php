<html>
<head>
</head>
<body>
<?php
$nr_indeksu = '169343';
$nrGrupy = "3";
echo 'Kamil Niewiadomski '.$nr_indeksu.' grupa '.$nrGrupy.'<br><br>';
echo 'Zastosowanie metody include() i require_once()<br>';
include "test.php";
require_once("test2.php");
echo 'Zastosowanie include() z pliku test.php<br>';
echo 'liczba pobrana wynosi: '.$pobieranaliczba.'<br>';
echo 'Zastosowanie require_once() z pliku test2.php<br>';
echo 'liczba pobrana przez require wynosi: '.$pobieranaliczbaj.'<br>';
echo 'Zastosowanie if, else, elseif, switch<br>';
$a = 1;
$b = 2;
$c = 3;
if ($a > $b)
{
	echo $a.' z ifa<br>';
}
elseif ($b > $c)
{
	echo $b.' z elseif\'a<br>';
}
else
{
	echo $c.' z, else\'a<br>';
}
switch($b):
case 1:
echo 'switch, wartość 1<br>';
break;
case 2:
echo 'switch, wartość 2<br>';
break;
case 3:
echo 'switch, wartość 3<br>';
break;
endswitch;
echo 'Zastosowanie while() i for()<br>';
echo 'while()<br>';
$j = 0;
while ($j < 5){
	echo $j.'<br>';
	$j++;
}
echo 'for()<br>';
for ($i = 0; $i < 5; $i++){
	echo $i.'<br>';
}
echo 'Zastosowanie $_GET, $_POST i $_SESSION<br>';
if ($_GET){
echo $_GET["test"].'<br>';
}
else{
	echo 'nie podano żadnej zmiennej metodą GET<br>';
}
if ($_POST){
echo $_POST["test1"].'<br>';
}
else{
	echo 'nie podano żadnej zmiennej metodą POST<br>';
}
session_start();
if ($_SESSION){
echo $_SESSION.'<br>';
}
else{
	echo 'nie podano żadnej zmiennej metodą SESSION<br>';
}
?>
</body>
</html>