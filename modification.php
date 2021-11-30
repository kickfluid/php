<html>
	<?php 
		try { 
			$linkpdo = new PDO("mysql:host=localhost;dbname=gestion", 'root',);
			$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch (Exception $e) { 
			die('Erreur : ' . $e->getMessage()); 
		}

		$res = $linkpdo->prepare("SELECT * FROM usager WHERE ID=:ID");
		$res->execute(array('ID' => isset($_GET['ID']) ? $_GET['ID'] : null));
		$data = $res->fetch();
		?>
	<body>
		<form action="modificationpatient.php" method="POST">
			<input type="hidden" name="ID" value="<?php echo $data['ID']; ?>">
			Nom :         <input type='text' name="nom" value="<?php echo $data['nom']; ?>" required /><br/>
			Prenom :      <input type='text' name="prenom" value="<?php echo $data['prenom']; ?>" required/><br/>
			Adresse :     <input type='text' name="adresse" value="<?php echo $data['adresse']; ?>" required/><br/>
			Code Postal : <input type='text' name="cp" value="<?php echo $data['CP']; ?>" required/><br/>
			Ville :       <input type='text' name="ville" value="<?php echo $data['ville']; ?>" required/><br/>
			Civilité :         <input type='text' name="civilite" value="<?php echo $data['civilite']; ?>" required/><br/>
            Date de naissance :         <input type='date' name="date_naissance" value="<?php echo $data['date_de_naissance']; ?>" required/><br/>
            Lieu de naissance :         <input type='text' name="lieu_naissance" value="<?php echo $data['lieu_naissance']; ?>" required/><br/>
            Numéro de sécurité sociale :         <input type='text' name="num_secu" value="<?php echo $data['num_secu']; ?>" required/><br/>
            <!-- médecin -->
			<input type='reset' />
			<input type='submit' value="modifier"/>

		</form>
	</body>

		



		</table>
		<form action="CarnetAdresses.php"><button>retour</button></form>
</html>