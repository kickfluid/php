<html>
	<meta charset="UTF-8">
	<body>
		<form action="ajoutmedecin.php" method="POST">
			<!-- Civilité : <input type='text' name="civilite" required/><br/> -->

			Civilité : <select name="civilite" required>
				<option value="NULL" default>-- Civilité --</option>
				<option value="F" default> Femme </option>
				<option value="M" default> Homme </option>
				<option value="X" default> Autre </option>
			</select><br/>

			Nom :      <input type='text' name="nom" required /><br/>
			Prenom :   <input type='text' name="prenom" required/><br/>
			<input type='reset' />
			<input type='submit'/>

		</form>
		<form action="index.php"><button>retour</button></form>
	</body>
</html>