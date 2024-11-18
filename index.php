<?php 
session_start();
// $_SESSION['nbre_produit'];

include 'config.php';


    $iduser = $_SESSION['iduser'];
    

    $stmt2 = $con->prepare("SELECT DISTINCT * FROM produit_commander WHERE iduser = '$iduser'");
    $stmt2->execute();

    $row = $stmt2->fetch();


    $nbre_produit = $stmt2->rowCount();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <style>
            #pan{
                height: 100%;
                width: 100%;
                display: flex;
                justify-content: center;
                margin-left:-1%;
            }
            #section7{
                width: 100%;
                height: 900px;
                background-color: #aaa9a9e3;
                padding-left: 15%;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                row-gap: 20px;
                padding-bottom: 5%;
                padding-top: 5%;
                margin-left: -10px;
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
            .cadre{
                height: 420px;
                width: 300px;
                background-color: white;
            }
            #footer{
                margin-top:-0px;
            }
        </style>
    </head>
    <body>
        <div id="contener">
            <!-- header-->
            <section id="header">
                <!-- navigation-->
                <div id="entete" >
                    <div id="logo">
                        <img src="image/galax.png" style="width: 90px; height: 90px; border-radius: 100%;">
                    </div>

                    <div id="nav">
                        <div id="lien">
                            <li><a href="#">Accueil</a></li>
                            <li><a href="foot.php">Football</a></li>
                            <li><a href="basket.php">Basketball</a></li>
                            <li><a href="autre.php">Autres</a></li>
                            <li><a href="accessoire.php">Accessoires</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </div>
                        <div id="icon">
                            <li><a href="panier.php"><img src="image/pann"></a></li>
                            <?php
                                // if($nbre_produit <= 0){ 
                            ?> 

                            <?php
                                // }else{

                            ?>
                            <p style="background: red; height: 20px; width: 20px; border-radius: 50%; margin-top: 3px; margin-left: -25px; text-align: center; font-size: larger;"><?php if(isset($_SESSION['iduser']))echo $nbre_produit; ?></p>
                            <?php  
                                // }
                            ?>
                            <li><a href="search.php"><img src="image/Vector3.png"></a></li>
                            <li><a href="connexion.php"><img src="image/Vector.png"></a></li>
                        </div>
                    </div>
                </div>

                <!-- carroussel-->
                <div id="carroussel">
                    <div class="carr">
                        <img src="image/running-2-miles-a-day-1024x576.jpg" alt="text-alternatif" class="img-carr" style="width: 65%;">
                        <img src="image/OIP (3).jpeg" alt="text-alternatif" class="img-carr">
                        <img src="image/R (2).jpeg" alt="text-alternatif" class="img-carr" style="width: 60%;">
                        <img src="image/OIP (2).jpeg" alt="text-alternatif" class="img-carr">
                        <img src="image/Young woman doing fitness in sportswear.png" alt="text-alternatif" class="img-carr">
                        <img src="image/R (1).jpeg" alt="text-alternatif" class="img-carr" style="width: 50%;">
                        <img src="image/OIP (4) 1.png" alt="text-alternatif" class="img-carr">

                    </div>
                </div> 

                <!-- bas-entete-->
                <div id="bas-entete">
                    <br><p>Galaxy Sport Equipement vous offre des Accessoires de sport de qualité à des prix abordables car votre satisfaction fait notre publicité</p>
                </div>
            </section>

            <div style="display: flex; flex-direction: row; justify-content: space-between; position: relative; margin-top: -5%;" >
                <div><img src="image/Asset 1@3x 2.png" alt="text-alternatif" style="height:80%; width: 80%;"></div>
                <div><img src="image/04.png" alt="text-alternatif" style="height: 80%; width: 80%;"></div>
            </div>
            
           

            <!-- partie2-->
            <section id="section1" style="margin-top:-35%; position: absolute;">
                <h1 data-aos="fade-up" data-aos-duration="900" data-aos-delay="300" style="text-align: center;">Quelques Accessoires</h1>
                <div id="overflow">
                    <div style="display: flex; flex-direction: row; justify-content: space-around;">
                        <div>
                            <img src="image/2-8.jpg" alt="text-alternatif" class="img"  data-aos="fade-up" data-aos-duration="1100" data-aos-delay="450">
                        </div>
    
                        <div>
                            <img src="image/unsplash_8WGscMKJ6bU.png" alt="text-alternatif" class="img"  data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                        </div>
    
                        <div>
                            <img src="image/unsplash_d3bYmnZ0ank.png" alt="text-alternatif" class="img" data-aos="fade-up" data-aos-duration="1300" data-aos-delay="550">
                        </div>
                        
                        <div>
                            <img src="image/30day-chest-xdb-30-degree-incline-dumbbell-fly-2.jpg" alt="text-alternatif" class="img" data-aos="fade-up" data-aos-duration="1400" data-aos-delay="600">
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: row; margin-top: 30px; justify-content: space-around;">
                        <div>
                            <img src="image/OIP.jpeg" alt="text-alternatif" class="img" data-aos="fade-down" data-aos-duration="1500" data-aos-delay="400">
                        </div>
    
                        <div>
                            <img src="image/Pexels Photo by JÉSHOOTS.png" alt="text-alternatif" class="img" data-aos="fade-down" data-aos-duration="1600" data-aos-delay="400">
                        </div>
    
                        <div>
                            <img src="image/Pexels Photo by Julia Kuzenkov.png" alt="text-alternatif" class="img" data-aos="fade-down" data-aos-duration="1/00" data-aos-delay="400">
                        </div>
    
                        <div>
                            <img src="image/R.jpeg" alt="text-alternatif" class="img" data-aos="fade-down" data-aos-duration="1800" data-aos-delay="400">
                        </div>
                    </div>
                </div>
            </section>

            <!-- partie3-->

            <section id="section2">
                <div id="anim">
                    <div id="ombre">
                        <img src="image/image 1.png" alt="text-alternatif" style="width: 100%; height: 400px;" class="ombre" id="image1">
                        <img src="image/image 2.png" alt="text-alternatif" style="width: 100%; height: 400px;" class="ombre" id="image2">
                        <img src="image/Layer 4 1.png" alt="text-alternatif" style="width: 100%; height: 100%; display: block;" class="ombre" id="image3">
                        <img src="image/image 6.png" alt="text-alternatif" style="width: 100%; height: 400px;" class="ombre" id="image4">
                        <img src="image/image 3.png" alt="text-alternatif" style="width: 100%; height: 400px;" class="ombre" id="image5">
                    </div>
    
                    <div class="ims">
                        <div class="tp" id="mot1"><h3>TOP CLASS RUNNING SHOES</h3></div>
                        <div class="tp" id="mot2"><h3>CLASSIC & CASUAL SNEAKER</h3></div>
                        <div class="tp" id="mot3"><h3>BEST SHOES FOR RUNNING 2022</h3></div>
                        <div class="tp" id="mot4"><h3>TOP RATED SHOES</h3></div>
                        <div class="tp" id="mot5"><h3>HIGH-QUALITY SNEAKER</h3> </div>  
                    </div>
                </div>

                <div class="bouton">
                    <a href="sneakers.php"><button style="cursor: pointer; color: white;">SHOP NOW</button></a>
                </div>
            </section>

            <!-- partie3-->

            <section id="section3">
                <div class="cad1" >
                    <img src="image/Rectangle 19.png" alt="text-alternatif">
                    <p>Materiels, équipements et tenues pour homme</p>
                    
                </div>
                
                <div class="cad1">
                    <img src="image/bruce-mars-HHXdPG_eTIQ-unsplash 1.png" alt="text-alternatif">
                    <p>Materiels, équipements et tenues pour femme</p>
                    
                </div>
            </section>


            <!-- partie5-->
            <section id="section5">
                <div id="cd">
                    <div style="">
                        <img src="image/unsplash_9HI8UJMSdZA.png" alt="text-alternatif" style="width: 200%; height: 100%;">
                    </div>
                    <div style="height: 100%; width: 400px; text-align: center; line-height: 20px; margin-top: 5%;">
                       <h3 style="text-transform: uppercase; font-size: large;">Matériels d'athlétisme</h3> 
                       <p style="font-size: medium;">Nous mettons à votre disposition tout équipements de sprint, et course d'endurance ainsi qu'en équipe</p>
                       
                    </div>
                </div>

                <div id="cd" style="margin-top: 10%;">
                    <div style="height: 100%; width: 400px; text-align: center; line-height: 20px; margin-top: 3%;">
                        <h3 style="text-transform: uppercase; font-size: large;">Matériels fitness</h3> 
                        <p style="font-size: medium;">Nous mettons à votre disposition tout équipements de musculation, de cardio et bien d'autres</p>
                       
                    </div>
                    <div style="margin-left: -10%;">
                        <img src="image/unsplash_wy_L8W0zcpI.png" alt="text-alternatif" style="width: 150%; height: 100%;">
                    </div>
                </div>
            </section>

            <!-- partie6-->
            <section id="section6">
                <div >
                    <div style="display: flex; flex-direction: row;width: 100%;">
                        <div class="imp" style="width: 700px;">
                            <img src="image/IMG-20241022-WA0059.jpg" alt="text-alternatif" style="width: 85%; height: 80%; margin-top: 15px; object-fit: contain;" id="nike godasse">
                            
                            
                        </div>
                        <div class="imp" style="margin-left: 20px; width: 360px;">
                            <img src="image/air-caucasian-professional-male-athlete-runner-training-isolated-white-background 1.png" alt="text-alternatif" style="width: 75%; height: 100%; object-fit: contain;" id="training short">
                        </div>
                    </div>
    
                    <div style="display: flex; flex-direction: row; margin-top: 10px; width: 100%;">
                        <div class="imp" style="width: 460px; height: 300px;">
                            <img src="image/Layer 9 1.png" alt="text-alternatif" style="width: 75%; height: 100%; object-fit: contain;" id="layer 9">
                        </div>
                        <div class="imp" style="width: 600px;height: 300px; margin-left: 20px;">
                            <img src="image/challenging-herself-full-length-attractive-young-woman-sports-clothing-jumping-while-hovering-against-grey-background 1.png" alt="text-alternatif" style="width: 75%; height: 100%; object-fit: contain;" id="herselful">
                        </div>
                    </div>
                </div>

                <div class="imps">
                    <img src="image/full-length-portrait-pretty-sportswoman-doing-stretching-exercises 1.png" alt="text-alternatif" style="width: 100%; height: 100%; object-fit: contain;" id="collant fille">
                </div>
            </section>

            <!-- partie7-->
            <?php    

                include 'config.php';

                $stmt = $con->prepare("SELECT * FROM produit WHERE categorieproduit = 'menu'");
                $stmt->execute();

                $row = $stmt->fetch();


                ?>
                <h1>QUELQUES PRODUITS</h1>
            <div id="pan">
                
                <section id="section7">
                    
                    
                    <?php

                    do{


                    ?>

                    <form action="insertion_produit_panier.php" method="post">

                        <a href="insertion_produit_panier.php?idproduit=<?php echo $row['idproduit'] ?>"><div class="cadre">
                            <div style="width: 100%; height: 60%;"><img src="image/<?php echo $row['imageproduit'] ?>" id="sac training nba" alt="text-alternatif" style="height: 100%; width: 100%;object-fit: contain;"></div>
                            <div style="text-align: center;">
                                <p style="font-size: medium; text-transform: uppercase; font-weight: bold;"><a href="#"><?php echo $row['nomproduit'] ?></a></p>
                                <p style="font-size: medium; text-transform: uppercase; font-weight: bold;"><a href="#"><?php echo $row['prixproduit'] ?> fcfa</a></p>
                                <input type="submit" value="Buy now" name="acheter" class="buy">
                                <input type="hidden" name="iduser" value="<?php //echo $_SESSION['iduser'] ?>">
                                <input type="hidden" name="emailuser" value="<?php //echo $_SESSION['email'] ?>">
                                <input type="hidden" name="idproduit" value="<?php echo $row['idproduit'] ?>">
                                <input type="hidden" name="nomproduit" value="<?php echo $row['nomproduit'] ?>">
                                <input type="hidden" name="prixproduit" value="<?php echo $row['prixproduit'] ?>">
                                <input type="hidden" name="imageproduit" value="<?php echo $row['imageproduit'] ?>">
                                <input type="hidden" name="categorieproduit" value="<?php echo $row['categorieproduit'] ?>">
                            </div>
                        </div></a>
                    </form>
                    <?php

                    }while($row = $stmt->fetch());


                    ?>
                    
                </section>
            </div>

            <!-- footer-->
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
        </div>


        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
          AOS.init();
        </script>
        <script>
            /* chaussures*/
        document.getElementById('mot1').addEventListener('click', function() {
            var image1 = document.getElementById('image1');
            if (image1.style.display === 'none') {
                image1.style.display = 'block';
                image3.style.display='none';
                image2.style.display='none';
                image4.style.display='none';
                image5.style.display='none';
            } else {
                image1.style.display = 'none';
            }
            
        });

        document.getElementById('mot2').addEventListener('click', function() {
            var image2 = document.getElementById('image2');
            if (image2.style.display === 'none') {
                image2.style.display = 'block';
                image3.style.display='none';
                image1.style.display='none';
                image4.style.display='none';
                image5.style.display='none';
            } else {
                image2.style.display = 'none';
            }
        });

        document.getElementById('mot3').addEventListener('click', function() {
            var image3 = document.getElementById('image3');
            if (image3.style.display === 'none') {
                image3.style.display = 'block';
                image2.style.display='none';
                image4.style.display='none';
                image5.style.display='none';
                image1.style.display='none';
            } else {
                image3.style.display = 'none';
            }
        });

        document.getElementById('mot4').addEventListener('click', function() {
            var image4 = document.getElementById('image4');
            if (image4.style.display === 'none') {
                image4.style.display = 'block';
                image3.style.display='none';
                image2.style.display='none';
                image5.style.display='none';
                image1.style.display='none';
            } else {
                image4.style.display = 'none';
            }
        });

        document.getElementById('mot5').addEventListener('click', function() {
            var image5 = document.getElementById('image5');
            if (image5.style.display === 'none') {
                image5.style.display = 'block';
                image3.style.display='none';
                image2.style.display='none';
                image4.style.display='none';
                image1.style.display='none';
            } else {
                image5.style.display = 'none';
            }
        });

        /*etoile*/

        const starts = document.querySelectorAll('.etoile .start');
        starts.for((debut , num) => {
        debut.addEventListener('click' , () => {
                starts.forEach((debut , num2) => {
                    num >= num2 ? debut.classList.add('jaune') : debut.classList.remove('jaune');
                });
            })
        });

        </script>
    </body>
</html>