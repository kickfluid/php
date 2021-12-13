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
		?>
	<body>
		<form action="ajoutRDVback.php" method="POST">
			<?php echo $data['nom'].' '.$data['prenom'];?>
			<br/>
			<input type='hidden' name="id_usager" required /><br/>
			<select name="id_medecin" required>
							<option value="NULL" default>-- Médecin --</option>
						<?php
						while ($data2 = $res2->fetch()) {
							echo'<option value ="'.$data2['id_medecin'].'">'.$data2['nom'].'</option>';
						}
						$res2->closeCursor();
						?>
					</select>
					<br/>
			Date RDV :     <input type='date' name="rdv" required/><br/>
			Heure : <input type='time' name="duree" required/><br/>

			<input type='reset' />
			<input type='submit'/>

		</form>
	</body>
</html>