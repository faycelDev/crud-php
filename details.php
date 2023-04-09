<?php
session_start();
include('connection.php');


// Vérification si un identifiant de livre est passé en paramètre
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Requête SQL pour récupérer les détails du livre avec l'identifiant donné
    $sql = "SELECT * FROM book WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Récupération du résultat de la requête
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    // Affichage des détails du livre
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
    <div>
        <h1>Details book</h1>
    </div>
    <div>

<?php
        if ($book) {
            echo "Détails du livre :<br>";
            echo "ID : " . $book['id'] . "<br>";
            echo "Nom : " . $book['name'] . "<br>";
            echo "price : " . $book['price'] . "<br>";
            echo "ID du genre : " . $book['genre_id'] . "<br>";
        } else {
            echo "Livre non trouvé.";
        }
    } else {
        echo "Identifiant de livre manquant.";
    }

?>
    </div>
        <a href="show.php"><button type="button" class="btn btn-success">Return Home Page</button></a>
</body>
</html>