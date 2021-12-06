<?php		

	try { 
		$linkpdo = new PDO("mysql:host=localhost;dbname=gestion", 'root',);
		$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch (Exception $e) { 
		die('Erreur : ' . $e->getMessage()); 
	}


	$req = $linkpdo->prepare('UPDATE usager SET nom = :nvnom, prenom = :nvprenom, adresse = :nvadresse, CP = :nvcp, ville = :nvville, civilite = :nvcivilite, date_de_naissance = :nvdate_de_naissance, lieu_naissance = :nvlieu_naissance, num_secu = :nvnum_secu WHERE id_usager = :id_usager'); 
	
	$req->bindValue(':id_usager', $_POST['id_usager'], PDO::PARAM_INT);
	$req->bindValue(':nvnom', $_POST['nom'], PDO::PARAM_STR);
	$req->bindValue(':nvprenom', $_POST['prenom'], PDO::PARAM_STR);
	$req->bindValue(':nvadresse', $_POST['adresse'], PDO::PARAM_STR);
	$req->bindValue(':nvcp', $_POST['CP'], PDO::PARAM_INT);
	$req->bindValue(':nvville', $_POST['ville'], PDO::PARAM_STR);
	$req->bindValue(':nvcivilite', $_POST['civilite'], PDO::PARAM_STR);
	$req->bindValue(':nvdate_de_naissance', $_POST['date_de_naissance'], PDO::PARAM_STR);
	$req->bindValue(':nvlieu_naissance', $_POST['lieu_naissance'], PDO::PARAM_STR);
	$req->bindValue(':nvnum_secu', $_POST['num_secu'], PDO::PARAM_STR);


	$execute = $req->execute();

	if($execute){
		$message = 'Le contact a été mis à jour';
	} else {
		$message = 'Echec de la mise à jour du contact';
	}

?>
<html>
	<?=$message ?>
	<form action="index.php"><button>retour</button></form>

</html>

