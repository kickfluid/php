<html>
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
            <!-- médecin -->
			<input type='reset' />
			<input type='submit'/>

		</form>
	</body>
</html>