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
	<tr>><th>Civilité</th><th>Nom</th><th>Prénom</th></tr>

<?php
	$rechercher = '%'.$_POST['rechercher'].'%';
    $res = $linkpdo->prepare("SELECT * FROM medecin WHERE prenom LIKE :rechercher OR nom LIKE :rechercher");
    $res->execute(array('rechercher' => $rechercher));
        while ($data = $res->fetch()) {
?>
            <tr>
                <td><?php echo $data['civilite']; ?></td>
                <td><?php echo $data['nom']; ?></td>
                <td><?php echo $data['prenom']; ?></td>
                <td><a href="modificationmedecin.php?ID=<?php echo $data['id_medecin'];?>">oui</a></td> 
				<td><a href="supprissionmedecin.php?ID=<?php echo $data['id_medecin'];?>">oui</a></td>
            </tr>
<?php
        }
    $res->closeCursor();
?>
<form action="index.php"><button>retour</button></form>
</html>