<html>
<?php 
	try { 
		$linkpdo = new PDO("mysql:host=localhost;dbname=gestion", 'root',);
		$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connexion réussie <br/>";
	} 
	catch (Exception $e) { 
		die('Erreur : ' . $e->getMessage()); 
	}

	$civilite = $_POST['civilite'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];

			
	$req = $linkpdo->prepare('INSERT INTO medecin(civilite, nom, prenom) VALUES(:civilite, :nom, :prenom)'); 

	$req->execute(array('civilite' => $civilite,
	'nom' => $nom, 
	'prenom' => $prenom));



	echo "Médecin ajouté";
	


?>
<form action="index.php"><button>retour</button></form>
</html>