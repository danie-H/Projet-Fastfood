<?php
  //connection au serveur
   require 'admin/database.php';
 
  //sélection de la base de données:
  $db = Database::connect();
 
  //récupération des valeurs des champs:
  //nom:
  $nom     = $_POST["date"] ;
  //prenom:
  $prenom = $_POST["time"] ;
  //adresse:
  $adresse = $_POST["nbrpers"] ;
 
 
  //création de la requête SQL:
  $statement = $db->prepare("INSERT INTO  Reservation (Date,Heure,NbPersonne) values(?, ?, ?)");
    
 
  //exécution de la requête SQL:
  $statement->execute (array($name,$prenom,$adresse));
 
  Database:: disconnect();
  
?>