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
			<tr><th>Nom</th><th>Prénom</th><th>Civilité</th><th>Adresse</th><th>CP</th><th>Ville</th><th>Date de naissance</th><th>Lieu de naissance</th><th>Numéro de sécu</th><th>Modifier</th><th>Supprimer</th></tr>
		<?php
		$rechercher = '%'.$_POST['rechercher'].'%';
		$res = $linkpdo->prepare("SELECT * FROM usager WHERE prenom LIKE :rechercher OR nom LIKE :rechercher");
		$res->execute(array('rechercher' => $rechercher));
			 while ($data = $res->fetch()) { 
		?>
			 	<tr>
					<td><?php echo $data['nom']; ?></td>
					<td><?php echo $data['prenom']; ?></td>
                    <td><?php echo $data['civilite']; ?></td>
					<td><?php echo $data['adresse']; ?></td>
					<td><?php echo $data['CP']; ?></td>
					<td><?php echo $data['ville']; ?></td>
					<td><?php echo $data['date_de_naissance']; ?></td>
                    <td><?php echo $data['lieu_naissance']; ?></td>
                    <td><?php echo $data['num_secu']; ?></td>
					<td><a href="modifierusager.php?id_usager=<?php echo $data['id_usager'];?>">oui</a></td> 
					<td><a href="suppressionpatient.php?id_usager=<?php echo $data['id_usager'];?>">oui</a></td>   
				</tr>
			  
		<?php
			}
			 ///Fermeture du curseur d'analyse des résultats
			 $res->closeCursor();
		 ?>
		</table>
		<form action="index.php"><button>retour</button></form>
</html>