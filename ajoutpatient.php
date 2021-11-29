ajoutpatient

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

			
	$req = $linkpdo->prepare('INSERT INTO contact(nom, prenom, adresse, cp, ville, tel) VALUES(:nom, :prenom, :adresse, :cp, :ville, :tel)'); 

	$req->execute(array('nom' => $nom, 
	'prenom' => $prenom, 
	'adresse' => $adresse, 
	'cp' => $cp, 
	'ville' => $ville, 



	echo "Patient ajouté";
	


?>
<form action="CarnetAdresses.php"><button>retour</button></form>
</html>