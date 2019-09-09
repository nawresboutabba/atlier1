<HTML>
<head>
</head>
<body>
<?PHP
include "club.php";
if (isset($_GET['id'])){
	$club=new club(124,'test','test',20,50);
	$result=$club->recupererclub($_GET["id"]);
	foreach($result as $row){
		$id=$row['id'];
		$nom=$row['nom'];
		$description=$row['description'];
		$adresse=$row['adresse'];
		$domaine=$row['domaine'];
?>
<form method="POST">
<table>
<caption>Modifier club</caption>
<tr>
<td>id</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>Description</td>
<td><input type="text" name="description" value="<?PHP echo $description ?>"></td>
</tr>
<tr>
<td>Adresse</td>
<td><input type="text" name="adresse" value="<?PHP echo $adresse ?>"></td>
</tr>
<tr>
<td>Domaine</td>
<td><input type="text" name="domaine" value="<?PHP echo 
$domaine ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$club=new club($_POST['id'],$_POST['nom'],$_POST['description'],$_POST['adresse'],$_POST['domaine']);
	$club->modifierclub($club,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherclub.php');
}
?>
</body>
</HTMl>