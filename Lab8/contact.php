<?php
function PokazKontakt()
{
	echo '
	<div class="kontakt">
	<form method="post" name="KontaktForm" enctype="multipart/form-data">
	<table class="kontakt">
	<tr><td class="log4_t">[temat]</td><td><input type="text" name="temat" class="kontakt" /></td></tr>
	<tr><td class="log4_t">[treść]</td><td><input type="text" name="tresc" class="kontakt" /></td></tr>
	<tr><td class="log4_t">[email]</td><td><input type="text" name="email" class="kontakt" /></td></tr>
	<tr><td>&nbsp</td><td><input type="submit" name="kontakt_submit" class="kontakt" value="wyślij" /></td></tr>
	</table>
	</form>
	</div>
	';
}

function WyslijMailKontakt($odbiorca)
{
	if (empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
	{
		echo '[nie_wypelniles_pola]';
		echo PokazKontakt();
	}
	else
	{
		$mail['subject'] = $_POST['temat'];
		$mail['body'] = $_POST['tresc'];
		$mail['sender'] = $_POST['email'];
		$mail['recipient'] = $odbiorca;
		
		$header = "FROM: Formularz kontaktowy <".$mail['sender'].">\n";
		$header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding:";
		$header .= "X-Sender: ".$mail['sender'].">\n";
		$header .= "X-Mailer: PRapwww mail 1.2\n";
		$header .= "X-Priority: 3\n";
		$header .= "Return-Path: <".$mail['sender'].">\n";
		
		mail($mail['recipient'],$mail['subject'],$mail['body'],$header);
		
		echo '[wiadomosc_wyslana]';
	}
}

function PrzypomnijHaslo($odbiorca)
{
	if (empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email']))
	{
		echo '[nie_wypelniles_pola]';
		echo PokazKontakt();
	}
	else
	{
		include 'cfg.php';
		
		$mail['subject'] = $_POST['temat'];
		$mail['body'] = $pass;
		$mail['sender'] = $_POST['email'];
		$mail['recipient'] = $odbiorca;
		
		$header = "FROM: Formularz kontaktowy <".$mail['sender'].">\n";
		$header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding:";
		$header .= "X-Sender: ".$mail['sender'].">\n";
		$header .= "X-Mailer: PRapwww mail 1.2\n";
		$header .= "X-Priority: 3\n";
		$header .= "Return-Path: <".$mail['sender'].">\n";
		
		mail($mail['recipient'],$mail['subject'],$mail['body'],$header);
		
		echo '[wiadomosc_wyslana]';
	}
}
?>