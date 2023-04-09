<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="show.php"><button type="button" class="btn btn-success">Return Home Page</button></a>
</body>

</html>


<?php

include('connection.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des valeurs des champs de saisie
    $name = $_POST['nouveauLivre'];
    $price = intval($_POST['price']);
    $genre_id = intval($_POST['genre']);
    // $id = $_POST['id'];

    // Requête SQL d'insertion 
    $sql = "INSERT INTO book SET name=:name, price=:price, genre_id=:genre_id";


    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
    $stmt->bindValue(':price', $price, \PDO::PARAM_INT);
    $stmt->bindValue(':genre_id', $genre_id, \PDO::PARAM_INT);

    $stmt->execute();
    // Requête SQL pour récupérer le contenu de la table "categories"
    $sql2 = "SELECT genre, id FROM categories";
    $stmt = $conn->prepare($sql2);
    $stmt->execute();



    // Confirmation de l'ajout du livre
    echo "Livre ajouté avec succès.";
}


?>