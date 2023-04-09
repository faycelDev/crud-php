 <?php
session_start();
include('connection.php');

    $sql = "SELECT * FROM book";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $book = $stmt->fetchAll();

    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
     $listGenre = $stmt->fetchAll();

?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css"> 
     <title>Document</title>
 </head>

 <body>
      
 <a href="show.php"><button type="button" class="btn btn-danger">Return Home Page</button></a>
     <form method="POST" action="redirect.php">
         <label for="nouveauLivre">Nouveau livre :</label>
         <input type="text" id="nouveauLivre" name="nouveauLivre">
         <label for="price">price :</label>
         <input type="text" id="price" name="price">
         <!-- <input type="submit" value="Ajouter"></input> -->
         <select name="genre" id="genre">
             <option value="">-- SELECT --</option>

             <?php foreach ($listGenre as $genre) : ?>
                     <option value="<?= $genre["id"]; ?>">
                         <?= $genre['genre']; ?>
                     </option>
             <?php endforeach ?>
         </select>
         <input type="submit" value="Ajouter"></input>

     </form>
     

   
 </body>
</html>