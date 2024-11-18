<?php

   session_start();


   include 'config.php';
   $iduser = $_SESSION['iduser'];


   if(isset($_POST["envoyer"])){
      $nom = $_POST["nom"];
      $numerotel = $_POST["numerotel"];
      $code = $_POST["code"];
      $idcommande = $_POST["idcommande"];
      $lieu = $_POST["lieu"];
      $numerojouindre = $_POST["numerojouindre"];
      $datelivraison = date('Y-m-d H:i:s');

      $stmt = $con->prepare("INSERT INTO livraison (nom, numerotel, code, idcommande,lieu, numerojouindre, datelivraison) VALUES ('$nom', '$numerotel', '$code', '$idcommande ','$lieu', '$numerojouindre','$datelivraison')");
      if($stmt->execute()){
         $stmt1 = $con->prepare("SELECT * FROM utilisateur WHERE iduser = '$iduser'");
         $stmt1->execute();
         $row1 = $stmt1->fetch();
         $_SESSION['iduser'] = $row1["iduser"];
         $_SESSION['email'] = $row1["email"];
      }



      header('location: index.php');

   }
?> 