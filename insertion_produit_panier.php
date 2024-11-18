<?php
session_start();
    include 'config.php';

    

    if(isset($_POST['acheter'])){


        $idproduit = $_POST['idproduit'];
        $nomproduit = htmlspecialchars($_POST['nomproduit'], ENT_QUOTES);
        $prixproduit = $_POST['prixproduit'];
        $imageproduit = $_POST['imageproduit'];
        $categorieproduit = $_POST['categorieproduit'];
        $quantite = $_POST['quantite'];
        $iduser = $_SESSION['iduser'];
        $emailuser = $_SESSION['email'];
        $datecommande = date('Y-m-d H:i:s');

        $stmt = $con->prepare("SELECT * FROM produit_commander WHERE idproduit = ? AND iduser = ? ");
        $stmt->execute(array($idproduit, $iduser));


        if($stmt->rowCount() == 0){
            
            $stmt = $con->prepare("INSERT INTO produit_commander(idproduit,nomproduit,prixproduit,imageproduit,categorieproduit,quantite,iduser,emailuser,datecommande)
                                    VALUES ('$idproduit', '$nomproduit', '$prixproduit', '$imageproduit', '$categorieproduit', '$quantite', '$iduser', '$emailuser', '$datecommande')");
            $stmt->execute();

            header('location: panier.php');

        }else if($stmt->rowCount() > 0){
            $stmt = $con->prepare("SELECT quantite FROM produit_commander WHERE idproduit = '$idproduit'");
            $stmt->execute();
            $quantite = $stmt->fetch();
            $quantite = intval($quantite);

            $stmt2 = $con->prepare("UPDATE produit_commander SET quantite = $quantite + 1 WHERE idproduit = '$idproduit'");
            $stmt2->execute();

            // $stmt3 = $con->prepare("INSERT INTO produit_commander(idproduit,nomproduit,prixproduit,imageproduit,categorieproduit,quantite,iduser,emailuser,datecommande)
            //                         VALUES ('$idproduit', '$nomproduit', '$prixproduit', '$imageproduit', '$categorieproduit', '$quantite', '$iduser', '$emailuser', '$datecommande')");
            // $stmt3->execute();

            header('location: panier.php');

        }




    }

   


?>



