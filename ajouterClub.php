<?PHP
include "club.php";
if (isset($_POST['id']) and isset($_POST['nom']) and 
isset($_POST['description']) and isset($_POST['adresse']) 
and isset($_POST['domaine'])){
$club=new club($_POST['id'],$_POST['nom'],
$_POST['description'],$_POST['adresse'],$_POST['domaine']); 
$club->ajouterClub($club);
header('Location: afficherclub.php');
}
else 
{
	
	echo "Champs Manquants" ; 
}
?>