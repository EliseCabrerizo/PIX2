<!DOCTYPE html>

<html>
    
    <head>
        
        <title>FidyStep</title>
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="style.css">
            
    </head>
    
    <body>
        <div class="grid">
            <div class="box logo"><a href="index.html"><img src="./NvLogo.png"></a></div>
            <div class="box nouveautes"><a href="Nouveaute.html">Nouveaut&eacute;s</a></div>
            <div class="box qui"><a href="QuiSommesNous.html">Qui sommes nous ?</a></div>
            
            <div class="box contacter"><a href=#>Nous contacter</a></div>
            
        </div>
<?php 
	try{$mysqli = new PDO('mysql:host=fidystephefidbdd.mysql.db;dbname=fidystephefidbdd','fidystephefidbdd', 'Guyanne91680BDD'); }
	catch(Exception $e){die ('Erreur :'.$e->getMessage());}

	$objet=$_POST['objet'];
	$mail =$_POST['mail'];
	$corps =$_POST['corps'];

	$destinataire ='contact@fidystep.com';
	$contenu = '<p>Vous avez reçu un mail de'.$mail.'</p>';
	$contenu.='<p>Son message est :'.$message.'</p>';
	
	$headers = 'MIME-Version: 1.0'."\r\n";
	$headers .= 'Content-type : text/html; charset=iso-8859-1'."\r\n";
	
	// Pour envoyer un email HTML, l'en-tête Content-type doit être défini
	mail($destinataire, $objet, $contenu, $headers);
	
?>
<br /><br /><br /><br /><br />
<a href="index.php">
			<div style="text-align:center;">
				Votre mail a bien été envoyé. Nous vous contacterons au plus vite ! 
				<input type="submit" name="envoi" value="Retourner à l'accueil" />
				
			</div>
		</a>
</form>

</body>
</html>