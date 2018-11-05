<?php 
session_start();
$_SESSION['id'] =$_POST['id']; 
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
	} ?>
	<?php
	$compt = $mysqli ->prepare("SELECT COUNT(*) AS nbtype FROM Utilisateur WHERE identifiant = ? AND mot_de_passe= ?"); 
	$compt->execute($_POST['id'],$_POST['mdp']);
	if($compt>0)
	{
		header('location: LeoNews.html');
		}
    else
{
			echo "Le mot de passe ou l'identifiant est incorrect";
?>

				<a href="index.php">
			<div style="text-align:center;">
				<input type="submit" name="envoi" value="Revenir à la connexion" />
				
			</div>
		</a>
<?php
}
?>
</body>
</html>