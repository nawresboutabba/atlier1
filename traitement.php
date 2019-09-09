<?PHP
include "club.php";
if (isset($_POST['id']) and isset($_POST['nom']) and 
isset($_POST['description']) and isset($_POST['adresse']) 
and isset($_POST['domaine'])){
if (!empty($_POST['id']) and !empty($_POST['nom']) and 
!empty($_POST['description']) and !empty($_POST['adresse']) 
and !empty($_POST['domaine'])){
//$club=new club($_GET['id'],$_GET['nom'],
//$_GET['description'],$_GET['adresse'],$_GET['domaine']); 
//$club->ajouterClub($club);
//header('Location: afficherclub.php');
?>

	<h2>  Affichage des Clubs</h2>
<table border="2">
<tr>
<td>Id</td>
<td>Nom</td>
<td>Description</td>
<td>Adresse</td>
<td>Domaine</td>
</tr>
	<tr>
	<td><?PHP echo $_POST['id']; ?></td>
	<td><?PHP echo $_POST['nom']; ?></td>
	<td><?PHP echo $_POST['description']; ?></td>
	<td><?PHP echo $_POST['adresse']; ?></td>
	<td><?PHP echo $_POST['domaine']; ?></td>

	<?PHP
}
?>
</table>
<?PHP
}else{
	echo "Champs Manquants";
}
?>