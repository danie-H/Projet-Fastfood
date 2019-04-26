<?php

require'database.php';

if(!empty($_GET['id']))
{

$id = checkInput($_GET['id']);
}

$db = Database::connect();
$statement = $db->prepare('SELECT items.IdItems, items.Nom, items.Description, items.Prix, Categories.Nom AS Categorie
FROM items LEFT JOIN Categories ON items.Category = Categories.IdCategorie
WHERE items.IdItems = ?');

    $statement->execute(array($id));
    $item = $statement->fetch();
    Database :: disconnect();

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
         <title>FastFood</title>
         <meta charset="utf-8"/>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
         <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
         <link rel="stylesheet" href="../css/styles.css">
     </head>

     <body>
         <h1 class="text-logo">FastFood </h1>
   <div class="container admin">
          <div class="row">
               <div class="col-sm-6">
                       <h1><strong> Voir un item </strong></h1>
                    <br>
                       <form>
                         <div class="form-group">
                            <label>Nom:</label><?php echo '  ' . $item['Nom']; ?>
                         </div>
                         <div class="form-group">
                            <label>Description:</label><?php echo '  ' . $item['Description']; ?>
                         </div>
                         <div class="form-group">
                            <label>Prix::(en €)</label><?php echo '  ' . number_format((float)$item['Prix'],2,'.','€'); ?>
                         </div>
                         <div class="form-group">
                            <label>Categories:</label><?php echo '  ' . $item['Category']; ?>
                         </div>
                         <div class="form-group">
                            <label>Image:</label><?php echo '  ' . $item['image']; ?>
                         </div>
                         </form>
                         <div class="form-action">
                              <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
                        </div>


                  </div>
              <div class="col-sm-6 site">
   						                    <div class="thumbnail">
   							                         <img src="<?php echo '../images/' . $item['image'] ;?>" alt="...">
   							                         <div class = "price" ><?php echo number_format((float)$item['Prix'],2, '.' , '€' ); ?> </div>
   							                                <div class="caption">
   								                                      <h4><?php echo $item['Nom']; ?></h4>
   								                                      <p><?php echo  $item['Description'];?></p>
   								                                      <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>Commander</a>
   							                                 </div>

   						                    </div>

 					     </div>

       </div>

 </div>

     </body>
 </html>
