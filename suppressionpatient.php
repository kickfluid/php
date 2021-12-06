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
	

		$res = $linkpdo->prepare("DELETE FROM usager WHERE id_usager=:id_usager");
		$res->execute(array('id_usager' => isset($_GET['id_usager']) ? $_GET['id_usager'] : null));

		if($res){
			$message = 'Le contact a été supprimé';
		} else {
			$message = 'Echec de la suppression';
		}
	?>






	
			<?=$message ?>
			<form action="index.php"><button>retour</button></form>
</html>