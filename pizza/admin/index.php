
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
		<link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <h1 class="text-logo "> FastFood</h1>
        <div class="container admin ">
            <div class="row">
                <h1><strong>Liste des items   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Description</th>
                      <th>Prix</th>
                      <th>Catégorie</th>
                      <th>Actions</ th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                require 'database.php';

             $db = Database::connect();
             $statement = $db->query('SELECT items.IdItems, items.Nom, items.Description, items.Prix, Categories.Nom AS Categorie
             FROM items LEFT JOIN Categories ON items.Category = Categories.IdCategorie
             ORDER BY items.IdItems ');

             while($item = $statement->fetch())
             {

              echo'<tr>';
              echo'<td>' . $item['Nom'].'</td>' ;
              echo'<td>' . $item['Description'].'</td>' ;
              echo'<td>' . number_format((float)$item['Prix'],2,'.','') .'</td>' ;
              echo'<td>' . $item['Category'].'</td>' ;
              echo'<td width=300>';
              echo '<a class="btn btn-default" href="view.php?id=' .$item['IdItems'].'"><span class= glyphicon glyphicon-eye-open"> </span> Voir</a>';
              echo '   ';
              echo '<a class="btn btn-primary" href="update.php?id= ' .$item['IdItems'].'"><span class= glyphicon glyphicon-pencil"></span> Modifier</a>';
              echo '   ';
              echo '<a class="btn btn-danger" href="delete.php?id= ' .$item['IdItems'].'"><span class= glyphicon glyphicon-remove"></span> Supprimer </a>';

              echo '</td>';
              echo '</tr>';
             }
           Database :: disconnect();
                     ?>

                  </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
