<?php
$user = 'root';
$pass = '';
try{
$db = new PDO('mysql:host=localhost;dbname=examen_php',$user,$pass);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);




}catch(PDOException $e){
    echo"connexion échoué !".$e->getMessage();
}

