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


    

    <section class="products">

        <div class="container">

            <h2>Vendez votre propre fragrance</h2>
            <p><center>Il est possible de faire évoluer vos revenus </center></p>
            <p><center> <strong>Votre réussite est notre objectif premier</p></strong></center>
         

            <div class="product-grid">

                <div class="product">
                    <img src="parfum.jpg" alt="Parfum Femme" class="rotate-image">
                    <h3>Parfum pour Madame</h3>
                    <p>Déposez votre fragrance pour l’été</p>
                    <p><p>Cliquez <a href="creation.php" target="_blank">ici</a></p></p>
                </div>
                
                <div class="product">
                    <img src="parfumh.jpg" alt="Parfum Homme" class="rotate-image">
                    <h3>Parfum pour Monsieur</h3>
                    <p>Déposez votre parfum pour cet été</p>
                    <p>Cliquez <a href="creation.php" target="_blank">ici</a></p>
                    
                </div>
                
            </div>
        </div>
    </section>
    
    <section class= creation>
       <div class="li"> 
     <h2> Notre Equipe est là pour vous guider à la création de votre vitrine</h2>
     
       </div>
            <div class = "formulaire"> 
                <p> Pour plus d'information nous vous invitons à nous contacter   </p>
            </div>
       
            <div class= "boutton-container">           
             <a href="formulaire_message.php" class="button">Envoyer</a>
            </div> 
    
     <section class="hero">
        <div class="container">
            <h2>Découvrez Nos Nouveautés</h2>
            <p>Les meilleures fragrances pour toutes les occasions.</p>        
        </div>
     </section>

     <section class= "carroussel">

       <div class="carousel">
        <div class="carousel-track">
        
            <img src="parfum-carroussel2-alicia.jpg" alt="alicia"title="Parfum Alicia">
            <img src="parfum-carroussel3-prasa.jpg" alt="prasanna"title="Parfum Prasanna">
            <img src="parfum-carroussel4HOMME.jpg" alt="parfum homme"title="parfum tatou">
            <img src="parfum-carroussel1.jpg" alt="parfums">
        </div>
       </div>
       <section class= creation>
       <div class="li2"> 
     <h2> Extrait du Portefeuille clients Parfums : </h2> 
     <h2> été 2024</h2>
     <h2> <a href="tableau_parfums.php" target="_blank"><input type="button" value="Aperçu" class= button></a> </h2>
       </div>
       
       
      </section>
    

    
</body>

    

<?php include 'footer.html'; ?> <!--page footer à part-->

</html>