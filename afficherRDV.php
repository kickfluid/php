<html>
<?php 
		try { 
			$linkpdo = new PDO("mysql:host=localhost;dbname=gestion", 'root',);
			$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch (Exception $e) { 
			die('Erreur : ' . $e->getMessage()); 
		}


        $res = $linkpdo->prepare("SELECT * FROM medecin");
		$ret = $res->execute();
		if(!$ret){
			echo 'Erreur';
		}

		$res2 = $linkpdo->prepare("SELECT * FROM usager");
		$ret = $res2->execute();
		if(!$ret){
			echo 'Erreur';
		}

		$res3 = $linkpdo->prepare("SELECT * FROM consultation ORDER BY rdv desc");
		$ret = $res3->execute();
		if(!$ret){
			echo 'Erreur';
		}
		?>
<table border="1">
<tr><th>Date et Heure du RDV</th><th>Duree</th><th>Patient</th><th>Médecin</th></tr>
        
<tr>
        <?php
        while ($data = $res3->fetch()){
        ?>
					<td><?php echo $data['rdv']; ?></td>
					<td><?php echo $data['duree']; ?></td>
                    <td><?php echo $data['id_usager']; ?></td>
					<td><?php echo $data['id_medecin']; ?></td> 
        
</tr>
<?php
}
$res->closeCursor();
?>
</table>
</html>