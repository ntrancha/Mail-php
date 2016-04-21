<?php

$mail = 'toto@outlook.fr';
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){
	$passage_ligne = "\r\n";
}else{
	$passage_ligne = "\n";
}

$message_txt = "Message texte : blablabla";
$message_html = "<html><head></head><body>Message HTML ...</body></html>";
$sujet = "Sujet de l'email";

$header = "From: \"PRENOM NOM\"<email@gmail.fr>".$passage_ligne;
$header.= "Reply-to: \"PRENOM NOM\" <email@gmail.fr>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

$boundary = "-----=".md5(rand());

$message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
$message.= $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

mail($mail,$sujet,$message,$header);
?>
