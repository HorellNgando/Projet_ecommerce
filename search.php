<?php
    
    include 'config.php';


    // Recherche si une requête est envoyée
    if (isset($_GET['query'])) {
        $query = htmlspecialchars($_GET['query']);
        $sql = "SELECT * FROM produit WHERE nomproduit LIKE :query";
        $stmt = $con->prepare($sql);
        $stmt->execute(['query' => '%' . $query . '%']);
        
        $resultats = $stmt->fetchAll();
    }
?>

<?php

    session_start(); 

    include 'config.php';

    $stmt = $con->prepare("SELECT * FROM produit");
    $stmt->execute();

    $row = $stmt->fetch();


?>



<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="search.css">
        <style>
            .buy{
                background-color: black;
                height: 50px;
                width: 120px;
                padding: 10px;
                border-radius: 10px;
                color: white;
                cursor: pointer;
            }
            #form1{
                display: flex;
                flex-direction: row;
            }
            #form2{
                width: 99vw;
                display: grid;
                grid-template-columns: 1fr ;
                row-gap: 20px;
            }
            #panier{
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                margin-top:1%;
            }
        </style>
    </head>
    <body>
        <div id="contener">
            <div style="padding: 2%;">
                <a href="index.php"><img src="image/white-home-icon-transparent-png-6 3.png"></a>
            </div>
            <p>Que voulez - vous ?</p>
            <div id="rech">
                
                <form action="" method="GET" id="form1">
                    <input type="text" id="rechercher" name="query" placeholder="Rechercher un produit..." style="height: 33px;">
                    <label for="rechercher">
                        <button id = "recherche"><a href="#"><img src="image/Vector3.png" alt=""></a></button>
                    </label>
                </form>

        
            </div>
            <div id="form2">
                <?php if (isset($resultats) && count($resultats) > 0): ?>
                <h2 style="text-align: center; text-transform: uppercase; margin-top: 50px;">Résultats de la recherche pour "<?php echo htmlspecialchars($query); ?>"</h2>
                <?php foreach ($resultats as $row): ?>
                <form action="insertion_produit_panier.php" method="post">
                    <div id="panier">
                        <table border="0" style="border-collapse: collapse; width: 1440px;">
                            <tr>
                                <td style="width:360px; text-align:center;">
                                <div style=" height: 100px;">
                                    <img src="image/<?php echo $row['imageproduit'] ?>" id="sac training nba" alt="text-alternatif" style="height: 100%; width: 100%; object-fit: contain;">
                                </div>
                                </td>
                                <td style="width:600px; text-align:center;"><h2><?php echo htmlspecialchars($row['nomproduit']); ?></h2></td>
                                <td style="width:280px; text-align:center;"><h2><?php echo number_format($row['prixproduit']); ?> Fcfa</h2></td>
                                <td style="width:200px; text-align:center;">
                                    <form action="insertion_produit_panier.php" method="post">   
                                        <input type="submit" name="acheter" value="Buy now" class="buy">
                                    </form>
                                </td>
                                <input type="hidden" name="iduser" value="<?php echo $_SESSION['iduser'] ?>">
                                <input type="hidden" name="emailuser" value="<?php echo $_SESSION['email'] ?>">
                                <input type="hidden" name="idproduit" value="<?php echo $row['idproduit'] ?>">
                                <input type="hidden" name="nomproduit" value="<?php echo $row['nomproduit'] ?>">
                                <input type="hidden" name="prixproduit" value="<?php echo $row['prixproduit'] ?>">
                                <input type="hidden" name="imageproduit" value="<?php echo $row['imageproduit'] ?>">
                                <input type="hidden" name="categorieproduit" value="<?php echo $row['categorieproduit'] ?>">
                                <input type="hidden" name="quantite" value="<?php echo $row['quantite'] ?>">
                            </tr>
                        </table>
                    </div>
                </form>     

               
                <?php endforeach; ?>
                <?php elseif (isset($query)): ?>
                    <p>Aucun résultat trouvé pour "<?php echo htmlspecialchars($query); ?>"</p>
                <?php endif; ?>
            </div>
        </div>
    </body>

    <!-- <script>
        var recherche_utilisateur = document.getElementById("recherche_utilisateur");
        var button = document.getElementById("recherche");

        button.addEventListener("click", recuperer);
        function recuperer(){
            var recherche = recherche_utilisateur.value;
            console.log(recherche);
            return recherche;
        }

        <?php $recherche = recherche ?>

        

        

    </script> -->
</html>