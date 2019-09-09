<?PHP
include "config.php";
class Club{
	private $id;
	private $nom;
	private $description;
	private $adresse;
	private $domaine;
	function __construct($id,$nom,$description,$adresse,$domaine){
		$this->id=$id;
		$this->nom=$nom;
		$this->description=$description;
		$this->adresse=$adresse;
		$this->domaine=$domaine;
	}
	
	
	function getId(){
		return $this->id;
	}
	function getNom(){
		return $this->nom;
	}
	function getDescription(){
		return $this->description;
	}
	function getDomaine(){
		return $this->domaine;
	}
	function getAdresse(){
		return $this->adresse;
	}
	function afficherClub (){
		echo "<b>id : </b> ".$this->id."<br>";
		echo "<b>Nom:</b> ".$this->nom."<br>";
		echo "<b>Description:</b> ".$this->description."<br>";
		echo "<b>Adresse:</b> ".$this->adresse."<br>";
		echo "<b>Domaine:</b> ".$this->domaine."<br>";
	}
	function ajouterClub($club){
		$sql="insert into club (id,nom,description,
		domaine,adresse)values (:id, :nom,:description,:domaine,:adresse)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id=$club->getId();
        $nom=$club->getNom();
        $description=$club->getDescription();
        $adresse=$club->getDomaine();
        $domaine=$club->getAdresse();
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':description',$description);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':domaine',$domaine);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherClubs(){
		$sql="SElECT * From club";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		
	}
	
	function recupererClub($id){
		$sql="SELECT * from club where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function supprimerClub($id){
		$sql="DELETE FROM club where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierclub($club,$id){
		$sql="UPDATE club SET id=:idn, nom=:nom,description=:description,
		domaine=:domaine,adresse=:adresse WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idn=$club->getId();
        $nom=$club->getNom();
        $description=$club->getdescription();
        $adresse=$club->getAdresse();
        $domaine=$club->getDomaine();
		$datas = array(':idn'=>$idn,
		':id'=>$id, ':nom'=>$nom,
		':description'=>$description,':adresse'=>$adresse,
		':domaine'=>$domaine);
		$req->bindValue(':idn',$idn);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':description',$description);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':domaine',$domaine);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	
	function rechercherListeClub($domaine){
		$sql="SELECT * from employe where domaine=$domaine";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>