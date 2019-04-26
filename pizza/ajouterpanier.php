<?php
  //connection au serveur
  require 'admin/database.php';

            
 
  //sélection de la base de données:
   $db = Database::connect();
 
  //récupération des valeurs des champs:
  //nom:
  $nom     = $_POST["Nom"] ;
  //prix:
  $prix = $_POST["Prix"] ;
 
 
  //création de la requête SQL:
  $statement = $db->prepare("INSERT INTO  Panier1 (Nom,Prix) values(?, ?)");
    
 
  //exécution de la requête SQL:
 $statement->execute (array($nom,$prix));
 
 
?>