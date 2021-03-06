 <?php

 require 'database.php';

 $nameError= $descriptionError=$priceError=$imageError=$categoryError=$name=$description=$price=$category=$image="";
 if (!empty($_POST)) {

   $name           =  checkInput($_POST['Nom']);
   $description    =  checkInput($_POST['Description']);
   $price          =  checkInput($_POST['Prix']);
   $category       =  checkInput($_POST['Category']);
   $image          =  checkInput($_FILES['image']['name']);
   $imagePath      =  '../images/ . basename($image)';
   $imageExtension =  pathinfo($imagePath, PATHINFO_EXTENSION);
   $isSuccess      =  true;

   $isUploadSucces = false;
   # code...
 if (empty($name)) {

   $nameError = 'Ce champ ne peut pas etre vide ';
   $isSuccess = false;
   # code...
 }
 if (empty($description)) {

   $descriptionError = 'Ce champ ne peut pas etre vide ';
   $isSuccess = false;
   # code...
 }
 if (empty($price)) {

   $priceError = 'Ce champ ne peut pas etre vide ';
   $isSuccess = false;
   # code...
 }
 if (empty($category)) {

   $categoryError = 'Ce champ ne peut pas etre vide ';
   $isSuccess = false;
   # code...
 }
 if (empty($image)) {

   $imageError = 'Ce champ ne peut pas etre vide ';
   $isSuccess = false;
   # code...
 }
 else {
   # code...
   $isUploadSuccess = true;

  if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ){

    $imageError = "Les fichiers autorisés sont: .jpg, .jpeg, .png, .gif";
    $isUploadSuccess = false;

  }
  if (file_exists($imagePath)) {


    # code...
       $imageError = "le fichier existe déjà ";
       $isUploadSuccess = false;
  }

  if ($_FILES["image"]["size"] > 500000) {


    # code...
       $imageError = "le fichier ne doit pas dépasser les 500KB ";
       $isUploadSuccess = false;
  }
  if ( $isUploadSuccess) {
    # code...

    if (!move_uploaded_files($_FILES["image"]["tmp_name"], $imagePath)) {
      # code...

            $imageError = "il y a une erreur lors de l'upload";
            $isUploadSuccess = false;
    }
  }
 }

 if ($isSuccess && $isUploadSucces) {
   # code...

    $db = Database :: connect();
    $statement = $db->prepare("INSERT INTO  items (Nom,Description,Prix,Category,image) values(?, ?, ?, ?, ?)");
    $statement->execute (array($name,$description,$price,$category,$image));
    Database:: disconnect();
    header("Location: authentification.php");

 }

}


 function checkInput($data)
 {

   $data = trim($data);
     $data = stripslashes($data);
       $data = htmlspecialchars($data);

     return $data;
 }
 ?>

<!DOCTYPE html...>
<html>
    <head>
        <title>Burger Code</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>

    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
             <div class="row">
              <h1><strong> Ajouter un item </strong></h1>
           <br>
              <form class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                   <label for="name">Nom:</label>
                   <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
                   <span class="help-inline"><?php echo $nameError; ?></span>
                </div>

                <div class="form-group">
                   <label for="description">Description:</label>
                   <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
                   <span class="help-inline"> <?php echo $descriptionError; ?> </span>
                </div>

                <div class="form-group">
                   <label for="price">Prix:(en €)</label>
                   <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price; ?>">
                   <span class="help-inline"> <?php echo  $priceError; ?> </span>
                </div>


                <div class="form-group">
                   <label for="category">categories:</label>

          <select class="form-control" id="category" name="category">
            <?php
            $db= Database::connect();
            foreach ($db->query('SELECT * FROM Categories') as  $row)
             {
                 echo '<option value="' . $row['IdCategorie'] .'">' . $row['Nom'] . '</option>';
            }

           Database::disconnect();
            ?>


          </select>

                   <span class="help-inline"> <?php echo $categoryError; ?></span>
                </div>


                <div class="form-group">
                  <label for="image">sélectionner une image : </label>
                   <input type="file" id="image" name="image">
                 <span class="help-inline"><?php echo $imageError; ?></span>
                </div>

                <br>
                <div class="form-action">
                  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter </button>
                     <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
               </div>
                 </form>
         </div>
</div>

    </body>
</html>
