<?PHP
include "club.php";
if (isset($_POST["id"])){
	$club=new club(1,'test','test','test','test');
	$club->supprimerClub($_POST["id"]);
	header('Location: afficherclub.php');
}

?>