<html>
<?php 
		try { 
			$linkpdo = new PDO("mysql:host=localhost;dbname=gestion", 'root',);
			$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch (Exception $e) { 
			die('Erreur : ' . $e->getMessage()); 
		}


        $res = $linkpdo->prepare("SELECT c.id_medecin, m.id_medecin, c.id_usager, u.id_usager, u.nom as nomU, u.prenom as prenomU, m.nom as nomM, m.prenom as prenomM, c.rdv, c.duree
		FROM consultation c, medecin m, usager u
		WHERE c.id_medecin=m.id_medecin
		AND c.id_usager = u.id_usager
		ORDER BY c.rdv DESC");
		$ret = $res->execute();
		if(!$ret){
			echo 'Erreur';
		}
		?>
<table border="1">
<tr><th>Date et Heure du RDV</th><th>Duree</th><th>Patient</th><th>Médecin</th></tr>
        
<tr>
        <?php
        while ($data = $res->fetch()){
        ?>
					<td><?php echo $data['rdv']; ?></td>
					<td><?php echo $data['duree']; ?> minute(s)</td>
                    <td><?php echo $data['nomU']." ".$data['prenomU']; ?></td>
					<td><?php echo $data['nomM']." ".$data['prenomM']; ?></td> 
        
</tr>
<?php
}
$res->closeCursor();
?>
</table>
</html>