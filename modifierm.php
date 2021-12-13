<?php		
	try { 
		$linkpdo = new PDO("mysql:host=localhost;dbname=gestion", 'root',);
		$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch (Exception $e) { 
		die('Erreur : ' . $e->getMessage()); 
	}

	$req = $linkpdo->prepare('UPDATE medecin SET civilite = :nvcivilite, nom = :nvnom, prenom = :nvprenom WHERE id_medecin = :id_medecin'); 
	
	$req->bindValue(':id_medecin', $_POST['id_medecin'], PDO::PARAM_INT);
	$req->bindValue(':nvcivilite', $_POST['civilite'], PDO::PARAM_STR);
	$req->bindValue(':nvnom', $_POST['nom'], PDO::PARAM_STR);
	$req->bindValue(':nvprenom', $_POST['prenom'], PDO::PARAM_STR);

	$execute = $req->execute();

	if($execute){
		$message = 'Le médecin a été mis à jour';
	} else {
		$message = 'Echec de la mise à jour du médecin';
	}
?>

<html>
	<?=$message ?>
	<form action="index.php"><button>retour</button></form>

</html>