<?php
    include 'config.php';

    $idproduitcommande = $_POST['idproduitcommande'];
    // $nomproduit = $_POST['nomproduit'];
    // $prixproduit = $_POST['prixproduit'];
    // $imageproduit = $_POST['imageproduit'];
    // $categorieproduit = $_POST['categorieproduit'];
    // $iduser = $_POST['iduser'];
    // $emailuser = $_SESSION['email'];
    // $date = date(Y/m/d H:i:s);

    if(isset($_POST['remove'])){
        $stmt = $con->prepare("DELETE FROM produit_commander WHERE idproduitcommande='$idproduitcommande' ");
        $stmt->execute();

        header('location: panier.php');

    }

   


?>



