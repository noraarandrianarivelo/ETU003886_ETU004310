<?php
$id_objet = $_GET['id_objet'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="traitementEmprunt.php" method="post">
        <p><?= $id_objet?></p>
        <label for="nbr_jour"></label>
        <input type="number" name="nbr_jour" id="nbr_jour">

        <input type="hidden" name="id_objet" value="<?php echo $id_objet ?>">

        <input class="btn btn-success" type="submit" value="Emprunter">
    </form>
</body>

</html>