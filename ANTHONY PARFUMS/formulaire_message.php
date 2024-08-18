<?php
// Démarrer la session
session_start();



// Connexion à la base de données
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=parfums", $username, $password);

// Vérification des données du formulaire (méthode j ai changé par "POST" )
$nom = $_POST["nom"] ?? null;
$prenom = $_POST["prenom"] ?? null;
$email = $_POST["email"] ?? null;
$message = $_POST["message"] ?? null;
$pseudo= $_POST["pseudo"]?? null;
$mdp = $_POST["mdp"] ?? '';
$date_reception = date('Y-m-d'); // Génère la date actuelle


// Hachage du mot de passe
$hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

// Vérification si le pseudo existe déjà
$query = $database->prepare("SELECT COUNT(*) FROM formulaire_message WHERE pseudo = :pseudo");
$query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
$query->execute();
$exists = $query->fetchColumn();

if ($exists) {
    $message = "Erreur : Ce pseudonyme est déjà utilisé. Veuillez en choisir un autre.";
} 

    // Préparer la requête SQL d'insertion


if ($nom && $prenom && $email && $message && $pseudo && $hashedPassword && $date_reception ) {
    // Préparer la requête SQL d'insertion
    $query = $database->prepare("
        INSERT INTO formulaire_message (nom, prenom, email, message, pseudo, mdp, date_reception)
        VALUES (:nom, :prenom, :email, :message,:pseudo, :mdp, :date_reception)
    ");

    // Lier les valeurs aux paramètres de la requête

    
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':message', $message, PDO::PARAM_STR);
    $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $query->bindValue(':mdp', $hashedPassword, PDO::PARAM_STR);
    $query->bindValue(':date_reception', $date_reception, PDO::PARAM_STR); 
    

    // Exécuter la requête
    try {
        $query->execute();
        echo "Envoi réussi<br>"; 

        // Récupérer l'ID de la dernière insertion juste pour voir si c est ok pas forcement besoin
        /*$lastInsertId = $database->lastInsertId();
        echo "ID de la dernière insertion : " . $lastInsertId;*/

    } catch (PDOException $e) {
        echo "Erreur d'envoi : " . $e->getMessage();
    }
} else {
    echo "Veuillez remplir tous les champs.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire de contact</title>
</head>
            <!--insertion page entete-->
<header><?php include 'header.html'; ?></header>
<body> 
    <h1 style="text-align:center;">Sujet : Vente en ligne de mon parfum</h1>
    <h2>Sylvie, je veux en savoir plus, voici mes coordonnées et mes questions :</h2>
   
    <div class="formulaire-container">

        <form action="formulaire_message.php" method="post">

        <input type="text" name="pseudo" placeholder="Créez votre pseudo" required><br>
        <input type="password" id="mdp" name="mdp" placeholder="Créez votre mot de passe" required><br><br>
        <input type="text" name="nom" placeholder="Entrez votre nom" required><br> <!--ne pas oublier required pour une validation côté client.-->
        <input type="text" name="prenom" placeholder="Entrez votre prénom" required><br>
        <input type="email" name="email" placeholder="Entrez votre adresse e-mail" required><br>

            
            <label for="message">Message :</label><br><br>
            <textarea id="message" name="message" cols="40" rows="5" required></textarea>
           
            
            <div class="boutton-container">    
                <button type="reset" class="reset-button">Réinitialiser</button>
                <button type="submit" class="button">Ajouter</button>
            </div> 
        </form>
    </div>
    
    <footer><?php include 'footer.html'; ?></footer>
</body>
</html>
