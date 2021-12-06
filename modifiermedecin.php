<html>
	<?php 
		try { 
			$linkpdo = new PDO("mysql:host=localhost;dbname=gestion", 'root',);
			$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch (Exception $e) { 
			die('Erreur : ' . $e->getMessage()); 
		}
	

		$res = $linkpdo->prepare("DELETE FROM medecin WHERE id_medecin=:id_medecin");
		$res->execute(array('id_medecin' => isset($_GET['id_medecin']) ? $_GET['id_medecin'] : null));

		if($res){
			$message = 'Le médecin a été supprimé';
		} else {
			$message = 'Echec de la suppression';
		}
	?>
		<?=$message ?>
		<form action="index.php"><button>retour</button></form>
</html>