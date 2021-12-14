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

<table border="1">
	<tr><th>Civilité</th><th>Nom</th><th>Prénom</th><th>Modifier</th><th>Supprimer</th></tr>

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
                <td><a href="modifiermedecin.php?id_medecin=<?php echo $data['id_medecin'];?>">oui</a></td> 
				<td><a href="supprimermedecin.php?id_medecin=<?php echo $data['id_medecin'];?>">oui</a></td>
            </tr>
<?php
        }
    $res->closeCursor();
?>
</table></br>
<form action="index.php"><button>retour</button></form></br>
</html>