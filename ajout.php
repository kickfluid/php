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

			<nav>
				<ul>
					<li class="menu-deroulant">
					<a href="#">Médecin réferent</a>
					<ul class="sous-menu">
						<li><a href="#">Graphisme</a></li>
						<li><a href="#">Web & App</a></li>
						<li><a href="#">Marketing</a></li>
					</ul>
					</li>

			<input type='reset' />
			<input type='submit'/>

		</form>
	</body>
</html>