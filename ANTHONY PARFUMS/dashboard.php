<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: login3.php');
    exit;
}

// Connexion à la base de données avec gestion des erreurs
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

// Récupérer les informations de l'utilisateur
$user_id = $_SESSION['user_id'];
$stmt = $database->prepare("SELECT pseudo, date_reception FROM administrateurs WHERE id = :id");
$stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch();

// Vérifier si des résultats ont été trouvés
if (!$user) {
    echo '<p>Aucun message trouvé.</p>';
    exit; // Sortir du script si aucune donnée n'est trouvée
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <?php include 'header.html'; ?> <!--insertion page header-->
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
   <div class="formulaire-container">
    
           <section>
            <h2>Connexion réussie, <?php echo htmlspecialchars($user['pseudo']); ?> </h2>
        
            <h3>Heureux de vous compter parmi nos clients  :</h3>
            <h3> Depuis: <?php echo htmlspecialchars($user['date_reception']); ?></h3>      
        
            </section>

           
    
    
    <table>
    
            <thead>
                <tr>
                
                    <th>Vous avez la possibilité de:</th>
                    <th>Soumettre</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                
                    <td >Ajouter votre parfum :</td>
                    <td><a href="creation.php" class="button">Ok</a></td>
                </tr>
                <tr>
                    <td >Vous déconnectez :</td>
                    <td><a href="logout.php" class="button">Ok</a></td>
                </tr>
               
            </tbody>
        </table>
    </section>
</div>
</body>
<?php include 'footer.html'; ?> <!--insertion page footer-->
</html>
