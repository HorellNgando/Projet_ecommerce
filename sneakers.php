<?php

    session_start();    

    include 'config.php';

    $stmt = $con->prepare("SELECT * FROM produit WHERE categorieproduit = 'sneakers'");
    $stmt->execute();

    $row = $stmt->fetch();


?>



<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="equip.css">
        <link rel="stylesheet" href="style.css">

        <style>
            #shoes{
                width: 1300px;
                height: 2300px;
                background-color: #E4E4E4;
                padding-left: 7%;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                row-gap: 20px;
                padding-bottom: 5%;
                padding-top: 5%;
            }
            .buy{
                background-color: black;
                height: 50px;
                width: 120px;
                padding: 10px;
                border-radius: 10px;
                color: white;
                cursor: pointer;
            }
            #footer{
                margin-top:-0px;
            }
        </style>
    </head>
    <body>
        <div id="entete" >
            <div id="logo">
                <img src="image/galax.png" style="width: 90px; height: 90px; border-radius: 100%;">
            </div>

            <div id="nav">
                <div id="lien">
                    <li><a href="index.php">Accueil</a></li>
                            <li><a href="foot.php">Football</a></li>
                            <li><a href="basket.php">Basketball</a></li>
                            <li><a href="autre.php">Autres</a></li>
                            <li><a href="accessoire.php">Accessoires</a></li>
                            <li><a href="contact.php">Contact</a></li>
                </div>
                <div id="icon">
                    <li><a href="panier.php"><img src="image/pann.png"></a></li>
                    <li><a href="search.php"><img src="image/Vector3.png"></a></li>
                    <li><a href="connexion.php"><img src="image/Vector.png"></a></li>
                </div>
            </div>
        </div>

        <div style="margin-top: 10px; padding-left: 10px;">
            <a href="index.php"><img src="image/home-silhouette-button-free-vector.jpg" alt="text-alternatif" style="width: 50px; height: 50px;"></a>
        </div>

        <div id="contener" style="margin-top: 5%;">
            <section id="shoes">
            <?php

                do{


                ?>

                <form action="insertion_produit_panier.php" method="post">

                    <a href="insertion_produit_panier.php?idproduit=<?php echo $row['idproduit'] ?>"><div class="cadre">
                        <div style="width: 80%; height: 60%; padding: 10px; margin-left: 20px;"><img src="image/<?php echo $row['imageproduit'] ?>" id="sac training nba" alt="text-alternatif" style="height: 100%; width: 100%;object-fit: contain;"></div>
                        <div style="text-align: center;">
                            <p style="font-size: medium; text-transform: uppercase; font-weight: bold;"><a href="#"><?php echo $row['nomproduit'] ?></a></p>
                            <p style="font-size: medium; text-transform: uppercase; font-weight: bold;"><a href="#"><?php echo $row['prixproduit'] ?> fcfa</a></p>
                            <input type="submit" value="Buy now" name="acheter" class="buy">
                            <input type="hidden" name="iduser" value="<?php echo $_SESSION['iduser'] ?>">
                            <input type="hidden" name="emailuser" value="<?php echo $_SESSION['email'] ?>">
                            <input type="hidden" name="idproduit" value="<?php echo $row['idproduit'] ?>">
                            <input type="hidden" name="nomproduit" value="<?php echo $row['nomproduit'] ?>">
                            <input type="hidden" name="prixproduit" value="<?php echo $row['prixproduit'] ?>">
                            <input type="hidden" name="imageproduit" value="<?php echo $row['imageproduit'] ?>">
                            <input type="hidden" name="categorieproduit" value="<?php echo $row['categorieproduit'] ?>">
                            <input type="hidden" name="quantite" value="<?php echo $row['quantite'] ?>">
                        </div>
                    </div></a>
                </form>
                <?php

                }while($row = $stmt->fetch());


                ?>

            </section>
        </div>

        <section id="footer">
            <div id="foot1">
                <div class="ft1">
                    <h2>Galaxy sport Equipements</h2>
                    <p><a href="connexion.php">inscrivez vous</a></p>
                    <p><a href="#">galaxysportequip@gmail.com</a></p>
                </div>

                <div class="ft1">
                    <h2>Payement</h2>
                    <div style="display: flex; flex-direction: row; width: 80px; justify-content: space-between; margin-left: 10px;">
                        <a href="payement om.php"><img src="image/R (5) 1.png" alt="text-alternatif"></a>
                        <a href="mobile.php"><img src="image/R (7) 1.png" alt="text-alternatif"></a>
                    </div> 
                </div>

                <div class="ft1">
                    <h2>Commande</h2>
                    <p><a href="livraison.php">livraison</a></p>
                    
                </div>

                <div class="ft1">
                    <h2>Contactez nous</h2>
                    <div style="display: flex; flex-direction: row; justify-content: center;">
                        <div style="display: flex; flex-direction: row; width: 100px; justify-content: space-between;">
                            <a href="#"><img src="image/what.png" alt="text-alternatif" style="width: 28px; height: 28px;"></a>
                            <a href="#"><img src="image/insta.png" alt="text-alternatif" style="width: 25px; height: 25px;"></a>
                            <a href="#"><img src="image/OIP (12).jpeg" alt="text-alternatif" style="width: 25px; height: 25px;"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="foot2">
                <div style="display: flex; justify-content: space-around;"><div style="width: 75%; height: 2px; background-color: white; "></div></div>
                <div style="height: 40px;"><p>Copyright Dotcreativemarket, All Rights Reserved</p></div>
            </div>
        </section>
    </body>
</html>