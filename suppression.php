<?php
session_start();
$user = 'root';
$pass="";

$db = new PDO('mysql:host=localhost;dbname=examen_php',$user,$pass);

if(isset($_GET['id'])&& !empty($_GET['id'])){
    $getId = $_GET['id'];
    $selectUsers = "SELECT * FROM etudiant WHERE id = ?";
    $requeteUsers = $db->prepare($selectUsers);
    $requeteUsers->execute(array($getId));
if($requeteUsers->rowCount()> 0){
    //suppression de l'utilisateur
    $deleteUsers = "DELETE FROM etudiant WHERE id = ?";
    $requeteUsers = $db->prepare($deleteUsers);
    $requeteUsers->execute(array($getId));
    header('Location:index.php');
    $_SESSION['notification']['message']="l'etudiant a été supprimé avec success";
    $_SESSION['notification']['type']='danger';
    }

    }

     

else{
    echo"Aucun idendifiant trouvé";
}
