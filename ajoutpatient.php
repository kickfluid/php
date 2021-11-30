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

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$cp = $_POST['cp'];
	$ville = $_POST['ville'];
	$civilite = $_POST['civilite'];
	$date_naissance = $_POST['date_naissance'];
	$lieu_naissance = $_POST['lieu_naissance'];
	$num_secu = $_POST['num_secu'];

			
	$req = $linkpdo->prepare('INSERT INTO usager(nom, prenom, adresse, cp, ville, civilite, date_de_naissance, lieu_naissance, num_secu) VALUES(:nom, :prenom, :adresse, :cp, :ville, :civilite, :date_de_naissance, :lieu_naissance, :num_secu)'); 

	$req->execute(array('nom' => $nom, 
	'prenom' => $prenom, 
	'adresse' => $adresse, 
	'cp' => $cp, 
	'ville' => $ville,
	'civilite' => $civilite, 
	'date_de_naissance' => $date_naissance, 
	'lieu_naissance' => $lieu_naissance, 
	'num_secu' => $num_secu));



	echo "Patient ajouté";
	


?>
<form action="index.php"><button>retour</button></form>
</html>