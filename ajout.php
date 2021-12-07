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

<?php
    $res = $linkpdo->prepare("SELECT * FROM medecin");
    $ret = $res->execute();
	if(!$ret){
		echo 'Erreur';
	}
?>
	<body>
		<form action="ajoutpatient.php" method="POST">

			Nom :         <input type='text' name="nom" required /><br/>
			Prenom :      <input type='text' name="prenom" required/><br/>
			Adresse :     <input type='text' name="adresse" required/><br/>
			Code Postal : <input type='text' name="cp" required/><br/>
			Ville :       <input type='text' name="ville" required/><br/>
			Civilité :         <input type='text' name="civilite" required/><br/>
            Date de naissance :         <input type='date' name="date_naissance" required/><br/>
            Lieu de naissance :         <input type='text' name="lieu_naissance" required/><br/>
            Numéro de sécurité sociale :         <input type='text' name="num_secu" required/><br/>

					<select name="id_medecin" required>
							<option value="NULL" default>-- Médecin réferent --</option>
						<?php
						while ($data = $res->fetch()) {
							echo'<option value ="'.$data['id_medecin'].'">'.$data['nom'].'</option>';
						}
						$res->closeCursor();
						?>
					</select>
					<br/>
			<input type='reset' />
			<input type='submit'/>

		</form>
	</body>
</html>