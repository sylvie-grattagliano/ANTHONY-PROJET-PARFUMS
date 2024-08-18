<?php
session_start();
$message = "";

// Connexion à la base de données
try {
    $username = "root";
    $password = "";
    $database = new PDO("mysql:host=localhost;dbname=parfums", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

// Traitement du formulaire de connexion
if (isset($_POST['pseudo'], $_POST['mdp'])) {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];  // Mot de passe en clair soumis par l'utilisateur


    // Rechercher l'utilisateur dans la base de données
    $stmt = $database->prepare("SELECT * FROM administrateurs WHERE pseudo = :pseudo");
    $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    
    $stmt->execute();
    $user = $stmt->fetch();

    // Vérifier si un utilisateur a été trouvé et comparer le mot de passe
    if ($user && password_verify($mdp, $user['mdp'])) {
        
        // Le mot de passe est correct:

        $_SESSION['user_id'] = $user['id'];

        //  cookie pour stocker le pseudo de l'utilisateur
        setcookie('pseudo', $pseudo, time() + 3600, "/");  

        header('Location: dashboard.php');
        exit;

    } else {
        // Pseudo ou mot de passe incorrect
        $message = 'erreur GRRR';
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<?php include 'header.html'; ?> <!--insertion page header-->
<body>
<div class="formulaire-container">
      

    <h2>Login</h2>
    <section>
    <form action="login.php" method="post">

        
        <input type="text" id="pseudo" name="pseudo" placeholder=" Entrez votre pseudo" required><br>
        <br>
        
        <input type="password" id="mdp" name="mdp" placeholder="Entrez votre mot de passe"required>
        <br>

        <div class="boutton-container">
        <button type="submit" class="button">Se connecter</button>
        </div>
    </form>

</div>

    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

</body>
<?php include 'footer.html'; ?> <!--insertion page footer-->
</html>