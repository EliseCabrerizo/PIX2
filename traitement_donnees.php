<?php 
session_start();
$_SESSION['id'] =$_POST['login']; 
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
	<div id="header">
		<a href="index.php"><div id="titre">Léo News</div></a>
		<div id="menu">
		    <a href="http://www.devinci.fr/"><div id="onglet">Le Pôle</div></a>     
			<a href="OngletAdmin.html"><div id="onglet">Administration</div></a>
			<a href="OngletEvenement.html"><div id="onglet">Evènements</div></a>
			<a href="http://labs.esilv.fr/leodata/"><div id="onglet">Annales</div></a>
			<a href="OngletSport.html"><div id="onglet">Sport</div></a>
			<a href="OngletActu.html"><div id="onglet">Actualités</div></a>
			<a href="OngletAssociation.html"><div id="onglet">Associations</div></a>
			<a href="OngletForum.html"><div id="onglet">Forum</div></a>
		</div>
		<fore>
		<a href="index.php"><div id="onglet">Déconnexion</div></a>
		</fore>
	</div>
<?php 
	$mysqli = new PDO('mysql:host=localhost;dbname=LeoNews;charset=utf8','root', ''); 
	if(mysqli_connect_errno())
	{ 
		printf("Erreur de connexion");
		mysqli_connect_error();
	} 
?>
<?php 
	$mail=$_POST['email'];
	$nom =$_POST['nom'];
	$prenom =$_POST['prenom'];
	$id =$_POST['login'];
	$MDP =$_POST['motdepasse'];
	$CMDP =$_POST['confirmermotdepasse'];
	$ECOLE= $_POST['ecole'];
	$TD= $_POST['TD'];
	if($MDP!= $CMDP)
	{
?>
		<br /><br /><br /><br /><br />
		Vous n'avez pas entré les mêmes mots de passe. Veuillez rééssayer.
		<a href="Inscription.html">
			<div style="text-align:center;">
				<input type="submit" name="envoi" value="Revenir à l'inscription" />
			</div>
		</a>
<?php
	} 
	else{
	$req=$mysqli->prepare('INSERT INTO Utilisateur (identifiant, mot_de_passe, nom, prenom, email, role, ecole, TD) VALUES(:identifiant, :mot_de_passe, :nom, :prenom, :email, :role, :ecole, :TD)');
	$req ->execute(array(
	'identifiant'=>$id, 
	'mot_de_passe'=>$MDP, 
	'nom'=>$nom,
	'prenom'=>$prenom,
	'email'=>$mail,
	'role'=>'élève',
	'ecole'=>$ECOLE,
	'TD'=>$TD
	));
?>
<br /><br /><br /><br /><br />
Vous avez bien été inscrit ! Nous vous souhaitons une bonne visite sur notre site LeoNews !
<a href="index.php">
			<div style="text-align:center;">
				<input type="submit" name="envoi" value="Revenir à l'accueil" />
			</div>
		</a>
<?php
	}
?>
</body>
</html>