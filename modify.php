<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('connection.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM book WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $row['name'];
    $price = $row['price'];

    if (isset($_POST['modify'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stmt = $conn->prepare("UPDATE book SET name = :newName, price = :newPrice WHERE id = :id");
        $stmt->bindParam(':newName', $name);
        $stmt->bindParam(':newPrice', $price);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

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
    <a href="show.php"><button type="button" class="btn btn-success">Return Home Page</button></a>
    <h1>Modify book</h1>
    <form action="modify.php?id=<?php echo $id; ?>" method="POST">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>">
        <label for="price">Price :</label>
        <input type="text" id="price" name="price" value="<?php echo $price; ?>">
        <input type="submit" id="submit" name="modify">
    </form>
</body>

</html>