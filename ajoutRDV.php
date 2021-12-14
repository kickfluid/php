<html>
	RDV !
<?php 
		try { 
			$linkpdo = new PDO("mysql:host=localhost;dbname=gestion", 'root',);
			$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch (Exception $e) { 
			die('Erreur : ' . $e->getMessage()); 
		}

		$res = $linkpdo->prepare("SELECT * FROM usager WHERE id_usager=:id_usager");
		$res->execute(array('id_usager' => isset($_GET['id_usager']) ? $_GET['id_usager'] : null));
		$data = $res->fetch();

		$res2 = $linkpdo->prepare("SELECT * FROM medecin");
		$ret = $res2->execute();
		if(!$ret){
			echo 'Erreur';
		}

		$res3 = $linkpdo->prepare("SELECT m.id_medecin as idmm, u.id_medecin as idmu, m.nom, m.prenom 
		FROM medecin m, usager u");
		$ret = $res3->execute();
		if(!$ret){
			echo 'Erreur';
		}

		$data3 = $res3->fetch();
		?>
	<body>
		<form action="ajoutRDVback.php" method="POST">
			<?php echo $data['nom'].' '.$data['prenom'];?>
			<br/>
			<input type='hidden' name="id_usager" value="<?php echo $data['id_usager']; ?>"required /><br/>
			Médecin :
			<select name="id_medecin" required>
							
						<?php
						while ($data2 = $res2->fetch()) {
							if ($data3['idmm'] == $data3['idmu']){
								echo'<option value ="'.$data2['id_medecin'].'" selected >'.$data2['nom']." ".$data2['prenom'].'</option>';
							} else {
								echo'<option value ="'.$data2['id_medecin'].'">'.$data2['nom']." ".$data2['prenom'].'</option>';
							}
						}
						$res2->closeCursor();
						?>
					</select>
					<br/>
			Date et heure du RDV :     <input type='datetime-local' name="rdv" required/><br/>
			Durée(min) : <input type='number' name="duree" required/><br/>

			<input type='reset' />
			<input type='submit'/>

		</form>
	</body>
</html>