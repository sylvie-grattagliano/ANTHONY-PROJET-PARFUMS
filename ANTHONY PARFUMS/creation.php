<?php
// Démarrer la session
session_start();


?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire ajout parfum</title>
    <link rel="stylesheet" href="style.css">
</head>
<header><?php include 'header.html'; ?> <!--insertion page header--></header>

<body>
    <section class = "form">
        <div class= "ajouter">
    <h2>Ajoutez votre parfum :</h2>
        </div>
        
             
<!--ajout page cree pour traiter et envoyer donnees de mon formulaire-->
                   <form action="ajout.php" method="get">

                     <div class="formulaire-container">

                     <label for="nom">Nom du parfum :</label><br>
                <input type="text" id="nom" name="nom" required><br><br>

                <label for="genre">Genre :</label><br>
                <input type="text" id="genre" name="genre" required><br><br>

                <label for="alcool_degres">Degré d'alcool :</label><br>
                <input type="text" id="alcool_degres" name="alcool_degres" required><br><br>

                <label for="couleur">Couleur :</label><br>
                <input type="text" id="couleur" name="couleur" required><br><br>

                <label for="quantite_ml">Quantité (ml) :</label><br>
                <input type="number" id="quantite_ml" name="quantite_ml" required><br><br>

                <label for="createur">Créateur :</label><br>
                <input type="text" id="createur" name="createur" required><br><br>

                <label for="prix">Prix :</label><br>
                <input type="text" id="prix" name="prix" required><br><br>
            </div>
            
            
            
            <div class="boutton-container">    
                <button type="reset" class="reset-button">Réinitialiser</button>       
                <button type="submit" class="button">Ajouter</button>
               
                <!--<input type="reset" value="Reset">-->
            </div> 
            
    </form>
</body>
<?php include 'footer.html'; ?> <!--insertion page footer-->
</html>