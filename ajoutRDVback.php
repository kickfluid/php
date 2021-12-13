<html>
<?php 
	try { 
		$linkpdo = new PDO("mysql:host=localhost;dbname=gestion", 'root',);
		$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch (Exception $e) { 
		die('Erreur : ' . $e->getMessage()); 
	}

	$rdv = $_POST['rdv'];
	$duree = $_POST['duree'];
	$id_usager = $_POST['id_usager'];
	$id_medecin = $_POST['id_medecin'];

	$req = $linkpdo->prepare('INSERT INTO consultation(id_usager, id_medecin, rdv, duree) VALUES(:id_usager, :id_medecin, :rdv, :duree)'); 

	$ret = $req->execute(array('id_usager' => $id_usager, 
	'id_medecin' => $id_medecin, 
	'rdv' => $rdv, 
	'duree' => $duree));

	if(!$ret){
		echo 'Erreur';
	}

	echo "Patient ajouté";
	


?>
<form action="index.php"><button>retour</button></form>
</html>