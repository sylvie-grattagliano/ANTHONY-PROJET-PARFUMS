<?php
$username = "root";
$password = ""; // Ou "" sous Windows
$database = new PDO("mysql:host=localhost;dbname=parfums", $username, $password);



$nom = $_GET["nom"] ?? 0;
$genre = $_GET["genre"] ?? 0;
$alcool_degres = $_GET ["alcool_degres"] ?? 0;
$couleur = $_GET ["couleur"] ?? 0;
$quantite_ml = $_GET ["quantite_ml"] ?? 0;
$createur = $_GET ["createur"] ?? 0;
$prix = $_GET ["prix"] ?? 0;

// Préparer la requête SQL d'insertion dans la table sylvie de ma BDD parfums
$query = $database->prepare("
    INSERT INTO sylvie (nom, genre, alcool_degres, couleur, quantite_ml, createur, prix)
    VALUES (:nom, :genre, :alcool_degres, :couleur, :quantite_ml, :createur, :prix)
");

// Lier les valeurs aux paramètres de la requête
$query->bindValue(':nom', $nom, PDO::PARAM_STR);
$query->bindValue(':genre', $genre, PDO::PARAM_STR);
$query->bindValue(':alcool_degres', $alcool_degres, PDO::PARAM_STR);
$query->bindValue(':couleur', $couleur, PDO::PARAM_STR);
$query->bindValue(':quantite_ml', $quantite_ml, PDO::PARAM_INT);
$query->bindValue(':createur', $createur, PDO::PARAM_STR);
$query->bindValue(':prix', $prix, PDO::PARAM_STR);


// Exécuter la requête
try {
    $query->execute();
    echo "Insertion réussie";

    // Récupérer l'ID de la dernière insertion
    $lastInsertId = $database->lastInsertId();
    echo "ID de la dernière insertion : " . $lastInsertId;

} catch (PDOException $e) {
    echo "Erreur lors de l'insertion: " . $e->getMessage();
}


?>