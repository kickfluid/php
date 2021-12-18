<html>
<?php 
	try { 
		$linkpdo = new PDO("mysql:host=localhost;dbname=gestion", 'root',);
		$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch (Exception $e) { 
		die('Erreur : ' . $e->getMessage()); 
	}
?>

	<meta charset="UTF-8">
	<body>
		<table border="1">
			<tr><th>Tranche d'âge</th><th>Nb Hommes</th><th>Nb Femmes</th></tr>


				<?php
				$moins_25_m = $linkpdo->prepare("SELECT COUNT(*) as compteur_civilite
												FROM usager u
												WHERE civilite = 'H'
												AND YEAR(DATE(NOW())) - YEAR(date_de_naissance) < 25");
				$moins_25_m->execute();
				$data_25_m = $moins_25_m->fetch()
				?>



				<?php
				$entre_25_50_m = $linkpdo->prepare("SELECT COUNT(*) as compteur_civilite FROM usager WHERE civilite = 'H' AND YEAR(DATE(NOW())) - YEAR(date_de_naissance) >= 25 AND YEAR(DATE(NOW())) - YEAR(date_de_naissance) < 50");
				$entre_25_50_m->execute();
				$data_25_50_m = $entre_25_50_m->fetch()
				?>

				<?php
				$moins_50_m = $linkpdo->prepare("SELECT COUNT(*) as compteur_civilite FROM usager WHERE civilite = 'H' AND YEAR(DATE(NOW())) - YEAR(date_de_naissance) >= 50");
				$moins_50_m->execute();
				$data_50_m = $moins_50_m->fetch()
				?>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
				<?php
				$moins_25_f = $linkpdo->prepare("SELECT COUNT(*) as compteur_civilite FROM usager WHERE civilite = 'F' AND YEAR(DATE(NOW())) - YEAR(date_de_naissance) < 25");
				$moins_25_f->execute();
				$data_25_f = $moins_25_f->fetch()
				?>

				<?php
				$entre_25_50_f = $linkpdo->prepare("SELECT COUNT(*) as compteur_civilite FROM usager WHERE civilite = 'F' AND YEAR(DATE(NOW())) - YEAR(date_de_naissance) >= 25 AND YEAR(DATE(NOW())) - YEAR(date_de_naissance) < 50");
				$entre_25_50_f->execute();
				$data_25_50_f = $entre_25_50_f->fetch()
				?>

				<?php
				$moins_50_f = $linkpdo->prepare("SELECT COUNT(*) as compteur_civilite FROM usager WHERE civilite = 'F' AND YEAR(DATE(NOW())) - YEAR(date_de_naissance) >= 50");
				$moins_50_f->execute();
				$data_50_f = $moins_50_f->fetch()
				?>			

			<tr>
				<td>Moins de 25 ans</td>
				<td><?php echo $data_25_m['compteur_civilite']; ?></td>
				<td><?php echo $data_25_f['compteur_civilite']; ?></td>
			</tr>
			<tr>
				<td>Entre 25 ans et 50 ans</td>
				<td><?php echo $data_25_50_m['compteur_civilite']; ?></td>
				<td><?php echo $data_25_50_f['compteur_civilite']; ?></td>
			</tr>
			<tr>
				<td>Plus de 50 ans</td>
				<td><?php echo $data_50_m['compteur_civilite']; ?></td>
				<td><?php echo $data_50_f['compteur_civilite']; ?></td>
			</tr>
		</table></br>


		<?php
		$res = $linkpdo->prepare("SELECT SUM(c.duree) as nb_heures, m.nom as nomM, m.prenom as prenomM
									FROM consultation c, medecin m
									WHERE m.id_medecin = c.id_medecin
									GROUP BY m.id_medecin");
		$ret = $res->execute();
		if(!$ret){
			echo 'Erreur';
		}
		?>

		<table border="1">
		<tr><th>Médecin</th><th>Durée totale des consultations</th></tr>
				
		<tr>
				<?php
				while ($data = $res->fetch()){
				?>
							<td><?php echo $data['nomM'].' '.$data['prenomM']; ?></td>
							<td><?php echo $data['nb_heures']; ?> minute(s)</td>
 
				
		</tr>
		<?php
		}
		$res->closeCursor();
		?>
		</table>







		<form action="index.php"><button>retour</button></form>
	</body>
</html>