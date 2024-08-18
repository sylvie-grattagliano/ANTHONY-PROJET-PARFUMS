<?php
// Démarrer la session
session_start();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique de Parfums Sylvie</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php include 'header.html'; ?><!-- page header à part-->
<body>
    <h2> Extrait des parfums mis à disposition par nos clients pour cet été </h2>
<section> <!--section tableau parfums-->
    <?php
    $username = "root";
    $password = ""; // Ou "" sous Windows
    $database = new PDO("mysql:host=localhost;dbname=parfums", $username, $password);

    $query = $database->query("SELECT * FROM sylvie");
    $resultats = $query->fetchAll();
    ?>

    <div id="section1">
    <table>
<thead>
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>genre</th>
        <th>alcool_degres</th>
        <th>couleur</th>
        <th>quantite_ml</th>
        <th>createur</th>
        <th>prix</th>

    </tr>

</thead>

<tbody>

<!--boucle -->


<?php foreach ($resultats as $champs) { ?>
    <tr>
        <td><?php echo $champs["id"]; ?></td>
        <td><?php echo $champs["nom"]; ?></td>
        <td><?php echo $champs["genre"]; ?></td>
        <td><?php echo $champs["alcool_degres"]; ?></td>
        <td><?php echo $champs["couleur"]; ?></td>
        <td><?php echo $champs["quantite_ml"]; ?></td>
        <td><?php echo $champs["createur"]; ?></td>
        <td><?php echo $champs["prix"]; ?></td>


    </tr>
<?php } ?>


</tbody>
</div>
</table>

</body>

    

<?php include 'footer.html'; ?> <!--page footer à part-->

</html>