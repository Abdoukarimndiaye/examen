
<?php
session_start();
$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=examen_php',$user,$pass);
if(isset($_GET['id'])&& !empty($_GET['id'])){
    $getId = $_GET['id'];
    $sql = "SELECT * FROM etudiant WHERE id = ?";
    $requet = $db->prepare($sql);
    $requet->execute(array($getId));
    if($requet->rowCount()>0){
        $etudiant = $requet->fetch();
        $nom = $etudiant['nom'];
        $prenom = $etudiant['prenom'];
        $niveau = $etudiant['niveau'];
        $adresse = $etudiant['adresse'];
        if(isset($_POST['modifier'])){
             $nom = htmlspecialchars($_POST["nom"]);
            $prenom = htmlspecialchars($_POST["prenom"]);
            $niveau = htmlspecialchars($_POST["niveau"]);
            $adresse = htmlspecialchars($_POST["adresse"]);
            $sql = "UPDATE etudiant SET nom =?,prenom= ?, niveau =?,adresse =?WHERE id =?";
            $requete= $db->prepare($sql);
            $requete->execute(array($nom,$prenom,$niveau,$adresse,$getId));
            header('Location:index.php');
            $_SESSION['notification']['message']="l'etudiant a été modifié avec success";
            $_SESSION['notification']['type']='warning';
            }
            
            
            
            }
            else{
                echo"Aucun utilisateur trouvé";
            }
    }else{
        echo"Aucun identifiant trouvé";
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h1>Page de Modification </h1>
              
                <!-- Formulaire d'ajout d'articles -->
                <form method="Post" action="">
                
       
                    
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de l'etudiant:</label>
                        <input type="text"  class="form-control" value="<?=$nom?>"name="nom">
                    </div>
                  

                    <div class="mb-3">
                        <label for="text" class="form-label">Prenom :</label>
                        <input type="prenom" class="form-control" id="prenom" name="prenom" value="<?=$prenom?>">
                    </div>
                   
                    <div class="mb-3">
                        <label for="niveau" class="form-label">Niveau:</label>
                        <input type="text"  id="niveau"class="form-control " name="niveau" value="<?=$niveau?>" >
                    </div>
                   
                   
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse:</label>
                        <input type="text" class="form-control"  name="adresse" value="<?=$adresse?>">
                    </div>
                   
                    
                   
                    
                    <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
                </form>

                <!-- Ajoutez plus de contenu ici selon vos besoins -->
            </div>
            <div class="col-md-4">
                <!-- Sidebar, widgets, publicités, etc. peuvent être ajoutés ici -->
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
