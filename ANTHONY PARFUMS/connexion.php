<?php
// Démarrer la session
session_start();

// Connexion à la base de données
$username = "root";
$password = ""; // Ou "" sous Windows
$database = new PDO("mysql:host=localhost;dbname=parfums", $username, $password);

$message = ''; // Variable creer pour message erreur au cas où

// Récupération des données du formulaire
$pseudo = $_POST["pseudo"] ?? '';
$mdp = $_POST["mdp"] ?? '';

$date_reception = date('Y-m-d'); // Génère la date 

// Hachage du mot de passe
$hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

// Vérification si le pseudo existe déjà
$query = $database->prepare("SELECT COUNT(*) FROM administrateurs WHERE pseudo = :pseudo");
$query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
$query->execute();
$exists = $query->fetchColumn();

if ($exists) {
    $message = "Erreur : Ce pseudonyme est déjà utilisé. Veuillez en choisir un autre.";
    
} else {

    // Préparer la requête SQL d'insertion

    $query = $database->prepare("
        INSERT INTO administrateurs (pseudo, mdp,  date_reception)
        VALUES (:pseudo, :mdp, :date_reception)
    ");
    $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $query->bindValue(':mdp', $hashedPassword, PDO::PARAM_STR);
    
    
    $query->bindValue(':date_reception', $date_reception, PDO::PARAM_STR);

    // Exécuter la requête
    try {
        $query->execute();
        $lastInsertId = $database->lastInsertId();
        $message = "Inscription réussie. ID de la dernière insertion : " . $lastInsertId;
    } catch (PDOException $e) {
        $message = "Erreur lors de l'insertion: " . $e->getMessage();
    }
    
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php include 'header.html'; ?> <!--insertion page header-->
<body>
    <h2> Merci de vous enregistrer, nous vous ferons parvenir nos promotions!</h2>
    <div class="formulaire-container">
        <form action="connexion.php" method="post">
            <label for="pseudo">Pseudo :</label><br><br>
            <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo" required><br><br>
            
            <label for="mdp">Mot de Passe :</label><br><br>
            <input type="password" id="mdp" name="mdp" placeholder="Entrez votre mot de passe" required><br><br>
            
        <div class="boutton-container">           
                <button type="submit" class="button">S'inscrire</button>
            </div>
        </form>
        <?php if ($message): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        
    </div>       
</body>
<?php include 'footer.html'; ?> <!--insertion page footer-->
</html>
