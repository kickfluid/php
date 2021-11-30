<?php		

	try { 
		$linkpdo = new PDO("mysql:host=localhost;dbname=ex10", 'root',);
		$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch (Exception $e) { 
		die('Erreur : ' . $e->getMessage()); 
	}


	$req = $linkpdo->prepare('UPDATE contact SET nom = :nvnom, prenom = :nvprenom, adresse = :nvadresse, cp = :nvcp, ville = :nvville, tel = :nvtel WHERE ID = :ID'); 
	
	$req->bindValue(':ID', $_POST['ID'], PDO::PARAM_INT);
	$req->bindValue(':nvnom', $_POST['nom'], PDO::PARAM_STR);
	$req->bindValue(':nvprenom', $_POST['prenom'], PDO::PARAM_STR);
	$req->bindValue(':nvadresse', $_POST['adresse'], PDO::PARAM_STR);
	$req->bindValue(':nvcp', $_POST['cp'], PDO::PARAM_INT);
	$req->bindValue(':nvville', $_POST['ville'], PDO::PARAM_STR);
	$req->bindValue(':nvtel', $_POST['tel'], PDO::PARAM_INT);

	$execute = $req->execute();

	if($execute){
		$message = 'Le contact a été mis à jour';
	} else {
		$message = 'Echec de la mise à jour du contact';
	}

?>
<html>
	<?=$message ?>
	<form action="CarnetAdresses.php"><button>retour</button></form>

</html>

