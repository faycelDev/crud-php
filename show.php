<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>bibliotheque</h1>
  </div>
  <div class="container mt-5">

<?php
    $sql = "SELECT * FROM book";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $livres = $stmt->fetchAll();

    // print_r($livres);
?>
    <a href="add.php"><button type="button" class="btn btn-success">Add new book</button></a>
    <table class="table">
      <thead>
        <tr>
          <th>name</th>
          <th>price</th>
          <th>details</th>
          <th>Modify</th>
          <th>Delete</th>
        </tr>
<?php
        foreach ($livres as $row) {
?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><a href="details.php?id=<?php echo $row['id']; ?> "class="btn btn-success">Details</a></td>
            <td><a href="modify.php?id=<?php echo $row['id']; ?>  "class="btn btn-warning">Modify</a></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>  "class="btn btn-danger">Delete</a></td>
          </tr>
    <?php

        }
    ?>
      </thead>
    </table>
  </div>

</body>

</html>