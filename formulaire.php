
<?php
session_start();
include("database.php");
if(isset($_POST['inscrire'])){
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$niveau = htmlspecialchars($_POST['niveau']);
$adresse = htmlspecialchars($_POST['adresse']);
$errors = [];
if(!empty($nom)&& 
!empty($prenom)&& 
!empty($niveau)&&
!empty($adresse)){
if(empty($error)){
    $sql ="INSERT INTO etudiant(nom,prenom,niveau,adresse)VALUES(?,?,?,?)";
    $requete = $db->prepare($sql);
    $requete->execute(array($nom,$prenom,$niveau,$adresse));
    header('Location:index.php');
    $_SESSION['notification']['message']="l'etudiant a été inseré avec success";
    $_SESSION['notification']['type']='success';
    
   
}

}else{
    $errors[]="veuillez remplir tous les champs";
}
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
                <h1>Inscrivez-vous </h1>
              
                <!-- Formulaire d'ajout d'articles -->
                <form method="Post" action="">
                
        <?php if(isset($errors)):?>
            <?php foreach($errors as $error):?>
              <p><?=$error?></p>
                <?php endforeach?>
                <?php endif?>
                    
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de l'etudiant:</label>
                        <input type="text"  class="form-control" value="" name="nom">
                    </div>
                  

                    <div class="mb-3">
                        <label for="text" class="form-label">Prenom :</label>
                        <input type="prenom" class="form-control" id="prenom" name="prenom" value="">
                    </div>
                   
                    <div class="mb-3">
                        <label for="niveau" class="form-label">Niveau:</label>
                        <input type="text"  id="niveau"class="form-control " name="niveau" >
                    </div>
                   
                   
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse:</label>
                        <input type="text" class="form-control"  name="adresse">
                    </div>
                   
                    
                   
                    
                    <button type="submit" class="btn btn-primary" name="inscrire">inscrire</button>
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
