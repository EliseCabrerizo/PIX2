<?php 
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Actualité</title>
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
		<a href="LeoNews.html"><div id="titre">Léo News</div></a>
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
	<div id="sideMenu">
		<a href="Rechercher.html"><div id="item">
			<img src="img/recherche.png"/> Rechercher</div>
		</a>
		<a href="#LIEN"><div id="item">
			<img src="img/follow.png"/> Suivre
		</div></a>
		<a href="absence.php"><div id="item">
			<img src="img/absence.png"/> Absence
		</div></a>
		<a href="OngletRécupération.html"><div id="item">
			<img src="img/write.png"/> Ecrire Article
		</div></a>
	</div>
	
	<form id="article" action="traitement_article.php" method="post" >
	<div id= "bigNews" >
		<div id = "news">
			<label for ="titre">Titre :</label><input type="text" name="titre" size ="40" maxlength="30" required/><br/>
			<textarea name="cont" placeholder="Ecrivez votre article" required style="width:700px;height:800px;"></textarea>
			<div style="text-align:center;"><input type="submit" value="Envoyer"/></div>
		</div>
	</div>
	</form>
</body>
</html>