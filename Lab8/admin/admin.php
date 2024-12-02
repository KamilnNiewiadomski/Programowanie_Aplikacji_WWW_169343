<?php
function FormularzLogowania()
{
	$wynik = '
	<div class="logowanie">
	<h1 class="heading">Panel CMS</h1>
	<div class="logowanie">
	<form method="post" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
	<table class="logowanie">
	<tr><td class="log4_t">[email]</td><td><input type="text" name="login_email" class="logowanie" /></td></tr>
	<tr><td>[haslo]</td><td><input type="password" name="login_pass" class="logowanie" /></td></tr>
	<tr><td>&nbsp</td><td><input type="submit" name="x1_submit" class="logowanie" value="zaloguj" /></td></tr>
	</table>
	</form>
	</div>
	</div>
	';
	return $wynik;
}

function ListaPodstron($link)
{
	$query="SELECT * FROM page_list";
	$result = mysqli_query($link,$query);
	while($row = mysqli_fetch_array($result))
	{
		echo $row['id'].' '.$row['page_title'].' <br />';
	}
}

function EdytujPodstrone($link, $id)
{
	echo '<div class="edytowanie">
	<form method="post" name="edycja" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
	<table class="edytowanie">
	<tr><td class="log4_t">tytuł</td><td><input type="text" name="tytul" class="edytowanie" /></td></tr>
	<tr><td>treść</td><td><textarea name="tresc" class="edytowanie"></textarea></td></tr>
	<tr><td>status</td><td><input type="checkbox" name="status" class="edytowanie" /></td></tr>
	<tr><td>&nbsp</td><td><input type="submit" name="x1_submit" class="edytowanie" value="wyślij" /></td></tr>
	</table>
	</form>
	</div>';
	$title = $_POST['tytul'];
	$tresc = $_POST['tresc'];
	$status = $_POST['status'];
	$query="UPDATE page_list SET page_title='$title', page_content='$content', status='$status' LIMIT 1";
	mysqli_query($link,$query);
}

function DodajNowaPodstrone($link)
{
	echo '<div class="edytowanie">
	<form method="post" name="edycja" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
	<table class="edytowanie">
	<tr><td class="log4_t">tytuł</td><td><input type="text" name="tytul" class="edytowanie" /></td></tr>
	<tr><td>treść</td><td><textarea name="tresc" class="edytowanie"></textarea></td></tr>
	<tr><td>status</td><td><input type="checkbox" name="status" class="edytowanie" /></td></tr>
	<tr><td>&nbsp</td><td><input type="submit" name="x1_submit" class="edytowanie" value="wyślij" /></td></tr>
	</table>
	</form>
	</div>';
	$title = $_POST['tytul'];
	$content =  $_POST['tresc'];
	$status = $_POST['status'];
	$query="INSERT INTO page_list VALUES ('$title', '$content', '$status') LIMIT 1";
	mysqli_query($link,$query);
}


function UsunPodstrone($link, $id)
{
	$query="DELETE * FROM page_list WHERE id='$id' LIMIT 1";
	mysqli_query($link,$query);
}

include '../cfg.php';
echo FormularzLogowania();
if (!(empty($_POST['login_email'])) && !(empty($_POST['login_pass'])) && $_POST['login_email'] == $login && $_POST['login_pass'] == $pass){ session_start(); $_SESSION['admin'] = true; echo 'test';}
include '../contact.php';
#Pokazkontakt();
WyslijMailKontakt('169343@student.uwm.edu.pl');
if (!(empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))){
echo $_POST['temat'].$_POST['tresc'].$_POST['email'];
}
#ListaPodstron($link);
#EdytujPodstrone($link, 0);
#DodajNowaPodstrone($link);






/*
CREATE TABLE `moja_strona`.`page_list` (`id` INT NOT NULL AUTO_INCREMENT , `page_title` VARCHAR(255) NOT NULL , `page_content` TEXT NOT NULL , `status` INT NOT NULL DEFAULT '1' , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES ('1', 'strona_glowna', '<div class=\"recenzje\" style=\"margin-top:200px;\"><h1>KOMPUTER</h1><img src=\"img/test.jpeg\" class=\"zdjrec\">\r\n<table class=\"ocen\" border=\"1\">\r\n<tr>\r\n<th><span style=\"color: #FFFF00;\">żółtość</span></th>\r\n<th><span style=\"color: #AAAA00;\">czytnik płyt?</span></th>\r\n<th><span style=\"color: #AA99AA;\">ocena</span></th>\r\n</tr>\r\n<tr>\r\n<td>7/10</td>\r\n<td><i>poniekąd</i></td>\r\n<td>3,5</td>\r\n</tr>\r\n</table>\r\n</div>\r\n<div class=\"recenzje\"><h1>KOMPUTER</h1><img src=\"img/test2.jpg\" class=\"zdjrec\">\r\n<table class=\"ocen\" border=\"1\">\r\n<tr>\r\n<th><span style=\"color: #FFFF00;\">żółtość</span></th>\r\n<th><span style=\"color: #AAAA00;\">czytnik płyt?</span></th>\r\n<th><span style=\"color: #AA99AA;\">ocena</span></th>\r\n</tr>\r\n<tr>\r\n<td>4/10</td>\r\n<td>tak</td>\r\n<td>4</td>\r\n</tr>\r\n</table>\r\n</div>\r\n<div class=\"recenzje\"><h1>KOMPUTER</h1><img src=\"img/test3.jpg\" class=\"zdjrec\">\r\n<table class=\"ocen\" border=\"1\">\r\n<tr>\r\n<th><span style=\"color: #FFFF00;\">żółtość</span></th>\r\n<th><span style=\"color: #AAAA00;\">czytnik płyt?</span></th>\r\n<th><span style=\"color: #AA99AA;\">ocena</span></th>\r\n</tr>\r\n<tr>\r\n<td>0/10</td>\r\n<td><u>nie</u></td>\r\n<td>2</td>\r\n</tr>\r\n</table>\r\n</div>\r\n<div class=\"recenzje\"><h1>KOMPUTER</h1><img src=\"img/test4.jpg\" class=\"zdjrec\">\r\n<table class=\"ocen\" border=\"1\">\r\n<tr>\r\n<th><span style=\"color: #FFFF00;\">żółtość</span></th>\r\n<th><span style=\"color: #AAAA00;\">czytnik płyt?</span></th>\r\n<th><span style=\"color: #AA99AA;\">ocena</span></th>\r\n</tr>\r\n<tr>\r\n<td>0/10</td>\r\n<td>tak</td>\r\n<td>2,5</td>\r\n</tr>\r\n</table>\r\n</div>\r\n<div class=\"recenzje\"><h1>KOMPUTER</h1><img src=\"img/test5.jpg\" class=\"zdjrec\">\r\n<table class=\"ocen\" border=\"1\">\r\n<tr>\r\n<th><span style=\"color: #FFFF00;\">żółtość</span></th>\r\n<th><span style=\"color: #AAAA00;\">czytnik płyt?</span></th>\r\n<th><span style=\"color: #AA99AA;\">ocena</span></th>\r\n</tr>\r\n<tr>\r\n<td>0/10</td>\r\n<td><b>N/A</b></td>\r\n<td>2</td>\r\n</tr>\r\n</table>\r\n</div>\r\n<div class=\"galeria\">\r\n<h1 style=\"padding-top: 30px;\">\r\nGALERIA\r\n</h1>\r\n<img id=\"tt\" class=\"galeriaimg\" src=\"img/galeria1.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria2.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria3.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria4.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria5.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria6.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria7.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria8.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria9.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria10.jpg\">\r\n<p style=\"text-align: center;\">\r\n<b>zmień kolor tła!</b>\r\n</p>\r\n<script>\r\n$(\".galeriaimg\").on({\r\n \"mouseover\" : function(){\r\n $(this).animate({\r\n width: 300,\r\n height: 300\r\n }, 800);\r\n },\r\n \"mouseout\" : function() {\r\n $(this).animate({\r\n width: 150,\r\n height: 150\r\n }, 800);\r\n }\r\n});\r\n</script>\r\n<form method=\"POST\" name=\"background\" style=\"margin-left: 25%;\">\r\n <input type=\"button\" value=\"żółty\" onclick=\"changeh1(\'#FFF000\')\">\r\n <input type=\"button\" value=\"czarny\" onclick=\"changeBackground(\'#000000\')\">\r\n <input type=\"button\" value=\"biały\" onclick=\"changeBackground(\'#FFFFFF\')\">\r\n <input type=\"button\" value=\"zielony\" onclick=\"changeBackground(\'#00FF00\')\">\r\n <input type=\"button\" value=\"niebieski\" onclick=\"changeBackground(\'#0000FF\')\">\r\n <input type=\"button\" value=\"pomarańczowy\" onclick=\"changeBackground(\'#FF8000\')\">\r\n <input type=\"button\" value=\"szary\" onclick=\"changeBackground(\'#c0c0c0\')\">\r\n <input type=\"button\" value=\"czerwony\" onclick=\"changeBackground(\'#FF0000\')\">\r\n <input type=\"button\" value=\"domyślny\" onclick=\"changeBackground(\'#00FFFF\')\">\r\n</form>\r\n<p style=\"text-align: center;\">\r\n<b>zmień kolor sekcji!</b>\r\n</p>\r\n<form method=\"POST\" name=\"color\" style=\"margin-left: 25%;\">\r\n <input type=\"button\" value=\"żółty\" onclick=\"changerecenzje(\'#FFF000\')\">\r\n <input type=\"button\" value=\"czarny\" onclick=\"changerecenzje(\'#000000\')\">\r\n <input type=\"button\" value=\"biały\" onclick=\"changerecenzje(\'#FFFFFF\')\">\r\n <input type=\"button\" value=\"zielony\" onclick=\"changerecenzje(\'#00FF00\')\">\r\n <input type=\"button\" value=\"niebieski\" onclick=\"changerecenzje(\'#0000FF\')\">\r\n <input type=\"button\" value=\"pomarańczowy\" onclick=\"changerecenzje(\'#FF8000\')\">\r\n <input type=\"button\" value=\"szary\" onclick=\"changerecenzje(\'#c0c0c0\')\">\r\n <input type=\"button\" value=\"czerwony\" onclick=\"changerecenzje(\'#FF0000\')\">\r\n <input type=\"button\" value=\"domyślny\" onclick=\"changerecenzje(\'#00FFFF\')\">\r\n</form>\r\n</div>', '1'), ('2', 'podstrona1', '<div class=\"recenzje\" style=\"margin-top: 200px; height: 500px; text-align: left; text-align: center;\">\r\n<form method=\"POST\" action=\"mailto:169343@outlook.com\">\r\nKONTAKT<br>\r\n<input type=\"text\"><br>\r\n<input type=\"submit\" value=\"wyślij maila\">\r\n</form>\r\n</div>\r\n\r\n<!--\r\nenzomind.com/files/uwm/wyklady/ProjAppWeb/lab1.pdf\r\n-->\r\n', '1') 

*/
?>
