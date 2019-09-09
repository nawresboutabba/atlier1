<?PHP
include "club.php";
$club=new club(124,'test','test',20,50);
$listeclubs=$club->afficherClubs();

?>
<h2>  Affichage des Clubs</h2>
<table border="2">
<tr>
<td>Id</td>
<td>Nom</td>
<td>Description</td>
<td>Adresse</td>
<td>Domaine</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeclubs as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['description']; ?></td>
	<td><?PHP echo $row['adresse']; ?></td>
	<td><?PHP echo $row['domaine']; ?></td>
	<td><form method="POST" action="supprimerClub.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierClub.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


