<?php
session_start();
include('database.php');
$sql = "SELECT * FROM etudiant";
$requet = $db->prepare($sql);
$requet->execute();
$rows = $requet->fetchAll();
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container pt-5">
    <?php
    if(isset($_SESSION['notification']['message'])):?>
       <div class="alert alert-<?=$_SESSION['notification']['type']?>">
         <?=$_SESSION['notification']['message']?>
      </div> 
    
      <?php endif ?>
      <?php  $_SESSION['notification']['message']='' ?>
       <?php $_SESSION['notification']['type']=''?>
    </div>
    
   
    
    
    <div class="container pt-5">
    <hr>
    <a href="formulaire.php" class="btn btn-success shadow-sm">Ajouter un etudiant</a>
    <hr>
    </div>

    <div class="container pt-5">
        <table class="table ">
            <thead class="table-dark">
                <tr>
                    <td>Numero</td>
                    <td>Nom</td>
                    <td>Prenom</td>
                    <td>Niveau</td>
                    <td>Adresse</td>
                    <td>Suprimer</td>
                    <td>Modifier</td>
                    
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) : ?>
               
                        <td><?= $row->id?></td>
                        <td><?= $row->nom ?></td>
                        <td><?= $row->prenom ?></td>
                        <td><?= $row->niveau ?></td>
                        <td><?= $row->adresse ?></td>
                        <td><a class="btn btn-danger" href="suppression.php?id=<?= $row->id ?>">supprimer</a>
                        </td>
                        <td><a class="btn btn-success" href="modifier.php?id=<?= $row->id ?>">Modifier</a>
                        </td>
                       
                </tr>
                
              <?php endforeach; ?>
              

                
               
            </tbody>

        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
