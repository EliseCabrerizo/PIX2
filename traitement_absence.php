<?php 
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Léo News</title>
	<link rel="stylesheet" href="style.css">
	  <style type="text/css">
  <!--
    a {
      text-decoration: none;
    }
  //-->
  </style
  
</head>

<body>
	
<?php 
	$mysqli = new PDO('mysql:host=localhost;dbname=LeoNews;charset=utf8','root', ''); 
	if(mysqli_connect_errno())
	{ 
		printf("Erreur de connexion");
		mysqli_connect_error();
	} 
?>
<?php 
	$TD=$_POST['TD'];
	$Ecole =$_POST['Ecole'];
	$DateA=$_POST['DateA'];
	$Mess=$_POST['cont'];
	$req=$mysqli->prepare('INSERT INTO Absence (Date, Professeur, Message, Ajout) VALUES(:Date, :Professeur,:Message, NOW())');
	$req ->execute(array(
	'Date'=>$DateA,
	'Professeur'=>$_SESSION['id'],
	'Message'=>$Mess
	));
	?>
	<?php
	$passage_ligne = "\r\n";
	$compt = $mysqli ->prepare("SELECT email FROM Utilisateur WHERE Ecole = ? AND TD = ?"); 
	$compt->execute(array($Ecole,$TD));
	while($donnees = $compt->fetch());
	{
		$mail = '$donnees[\'email\']';
	}


 
$message_txt = $Mess;
$boundary = "-----=".md5(rand());
$sujet = "Absence";
$header = "From: <elise.cabrerizo@devinci.fr>".$passage_ligne;
$header.= "Reply-to: <elise.cabrerizo@devinci.fr>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail("elise.cabrerizo@yahoo.fr",$sujet,$message,$header);
//==========
header ('location: index.php');
?>
