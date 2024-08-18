<?php
// Démarrer la session
session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page Messages recus</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php include 'header.html'; ?><!-- page header à part-->
   
<body>

   
<?php


// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=parfums';
$username = 'root';
$password = '';
try {
    $pdo = new PDO($dsn, $username, $password);
    // Définir le mode d'erreur de PDO pour lancer des exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// execution Requête pour récupérer les messages mais sans la boucle while mais foreach as
$sql = "SELECT * FROM formulaire_message ORDER BY date_reception DESC";
try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
}


?>
    <h1>Messages Reçus</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>prenom </th>
                <th>email</th>
                <th>message</th>
                <th>date_reception</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message): ?> <!--boucle foreach as -->
                <tr>
                    <td><?php echo htmlspecialchars($message['id']); ?></td>
                    <td><?php echo htmlspecialchars($message['nom']); ?></td>
                    <td><?php echo htmlspecialchars($message['prenom']); ?></td>
                    <td><?php echo htmlspecialchars($message['email']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($message['message'])); ?></td>
                    <td><?php echo htmlspecialchars($message['date_reception']); ?></td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>

              
    
</body>
<?php include 'footer.html'; ?> <!--page footer à part-->

</html>