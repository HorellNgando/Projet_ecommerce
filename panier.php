<?php

    session_start();

    include 'config.php';

    if(!isset($_SESSION['iduser'])){
        header('location:index.php');
        exit;
    }else{

        $iduser = $_SESSION['iduser'];
        

        $stmt2 = $con->prepare("SELECT DISTINCT * FROM produit_commander WHERE iduser = '$iduser'");
        $stmt2->execute();

        $row = $stmt2->fetch();


        $nbre_produit = $stmt2->rowCount();

        // $_SESSION['nbre_produit'] = $nbre_produit;
        $stmt3 = $con->prepare("SELECT DISTINCT * FROM produit_commander WHERE iduser = '$iduser'");
        $stmt3->execute();

        $row3 = $stmt3->fetch();
        $total = 0;
        do{
            $total += $row3['prixproduit'] * $row3['quantite'];
        }while($row3 = $stmt3->fetch());
        // echo $total;

        if(isset($_POST['paye_btn'])){

            if(isset($_POST['paye'])){
                $choix = $_POST['paye'];

                if($choix == "Orange Money"){
                    header("location: payement om.php?prixtotal=$total");
                }else if($choix == "Mobile Money"){
                    header("location: mobile.php?prixtotal=$total");
                }
            }

        }
    }    

?>



<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="panier.css">
        <style>
            
            #panier h2 , #pro p{
                color: #6A8C9B;
                font-size: large;
                text-align: center;
            }

            #panier{
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                margin-top:1%;
                background-color:white;
            }
            #pro{
                width: 99vw;
                display: grid;
                grid-template-columns: 1fr ;
                row-gap: 20px;
            }
            .buy{
                background-color: black;
                height: 50px;
                width: 120px;
                padding: 10px;
                border-radius: 10px;
                color: white;
                text-transform: uppercase;
                cursor: pointer;
            }
            #payer{
                background-color: white;
                margin-top: 5px;
                text-align: center; 
            }
            .payer{
                background-color: #1E0882;
                height: 50px;
                width: 160px;
                padding: 10px;
                border-radius: 10px;
                color: white;
                font-size: large;
                text-align: center;
                text-transform: uppercase;
                cursor: pointer;
            }
            #select{
                display: flex;
                flex-direction: row;
                justify-content: center;
                margin-top:20px;
            }
            #select label{
                font-size: larger;
                color: #1E0882;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div id="contener">
            <div style="padding: 2%;">
                <a href="index.php"><img src="image/white-home-icon-transparent-png-6 3.png"></a>
            </div>
            <div id="contenu">
                <h2>Votre panier</h2>
            </div>

            <div id="pro">
                

                    
                <?php
                    if($stmt2->rowCount() == 0){ 

                ?>

                    <p>Votre panier est vide jusqu'à présent</p>

                <?php
                        }else{
                        do{

                ?>

                <div id="panier">
                    <table border="0" style="border-collapse: collapse; width: 1440px;">
                        <tr>
                            <td style="width:360px; text-align:center;">
                            <div style=" height: 100px;">
                                <img src="image/<?php echo $row['imageproduit'] ?>" alt="" style="height:100%; width:100%; object-fit: contain;">
                            </div>
                            </td>
                            <td style="width:600px; text-align:center;"><h2><?php echo $row['nomproduit'] ?></h2></td>
                            <td style="width:280px; text-align:center;"><h2><?php echo $row['prixproduit'] ?> fcfa</h2></td>
                            <td style="width:280px; text-align:center;"><h2><?php echo $row['quantite'] ?> </h2></td>
                            <td style="width:200px; text-align:center;">
                                <form action="supprimer_panier.php" method="post">
                                    <input type="hidden" name="idproduitcommande" value="<?php //echo $row['idproduitcommande'] ?>">
                                    <input type="submit" name="remove" value="remove" class="buy">
                                </form>
                            </td>
                        </tr>
                    </table>    
                </div>
                        
                    

                <?php  
                    }while($row = $stmt2->fetch());
                    }

                ?>

                <?php
                    
                    if($stmt2->rowCount() == 0){ 

                ?>

                    

                <?php
                        }else{
                        do{

                ?>
                <form method="post">
                    <div id="select">
                        <div style="">
                            <label for="paye">Payer par :  </label>
                            <label for="">
                                <input type="radio" value="Orange Money" name="paye" id="om" <?php if(isset($_POST['paye']) && $_POST['paye'] = 'Orange Money')echo 'checked'; ?>><img src="image/R (5) 1.png" alt="text-alternatif" style="height: 25px; width: 50px;  object-fit: contain;">
                                <input type="radio" value="Mobile Money" name="paye" id="mtn" <?php if(isset($_POST['paye']) && $_POST['paye'] = 'Mobile Money')echo 'checked'; ?>><img src="image/R (7) 1.png" alt="text-alternatif" style="height: 25px; width: 50px;  object-fit: contain;">
                            </label>
                        </div>
                    </div>

                    <div id="payer">
                        <input type="submit" name="paye_btn" value=" payer" class="payer">
                        <input type="hidden" name="prixtotal" value="<?php echo $total; ?>">
                    </div>
                </form>
                

                <?php  
                    }while($row = $stmt2->fetch());
                    }



                ?>
                
                
            </div>   
            
        </div>
    </body>
</html> 