<?php

   session_start();


include 'config.php';

if(isset($_POST["envoyer"])){
   $email = $_POST["email"];
   $password = $_POST["password"];
   $passwordconf = $_POST["passwordconf"];

   $stmt = $con->prepare("INSERT INTO utilisateur(email, motpasse, motpasseconf) VALUES ('$email', '$password', '$passwordconf')");
   if($stmt->execute()){
      $stmt1 = $con->prepare("SELECT * FROM utilisateur WHERE email = '$email'");
      $stmt1->execute();
      $row1 = $stmt1->fetch();
      $_SESSION['iduser'] = $row1["iduser"];
      $_SESSION['email'] = $row1["email"];
   }



   header('location: index.php');

}
?> 