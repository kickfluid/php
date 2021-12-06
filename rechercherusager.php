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
		?>
		<table border="1">
			<tr><th>Nom</th><th>Prénom</th><th>Adresse</th><th>CP</th><th>Ville</th><th>Tel</th><th>Modifier</th><th>Supprimer</th></tr>
		<?php
		$rechercher = '%'.$_POST['rechercher'].'%';
		$res = $linkpdo->prepare("SELECT * FROM contact WHERE prenom LIKE :rechercher OR nom LIKE :rechercher");
		$res->execute(array('rechercher' => $rechercher));
			 while ($data = $res->fetch()) { 
		?>
			 	<tr>
					<td><?php echo $data['nom']; ?></td>
					<td><?php echo $data['prenom']; ?></td>
					<td><?php echo $data['adresse']; ?></td>
					<td><?php echo $data['cp']; ?></td>
					<td><?php echo $data['ville']; ?></td>
					<td><?php echo $data['tel']; ?></td>
					<td><a href="modifier.php?ID=<?php echo $data['ID'];?>">oui</a></td> 
					<td><a href="supprimer.php?ID=<?php echo $data['ID'];?>">oui</a></td>   
				</tr>
			  
		<?php
			}
			 ///Fermeture du curseur d'analyse des résultats
			 $res->closeCursor();
		 ?>
		</table>
		<form action="CarnetAdresses.php"><button>retour</button></form>
</html>