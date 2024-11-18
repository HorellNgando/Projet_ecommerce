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



      header('location: livraison.php?message=VOTRE ACHAT A ETE EFFECTUER AVEC SUCCES. VOUS SEREZ LIVRER DANS UNE HEURE');
  

  
?> 
<!-- <a href="livraison.php?message=VOTRE ACHAT A ETE EFFECTUER AVEC SUCCES. VOUS SEREZ LIVRER DANS UNE HEURE"></a> -->
<?php
    }else{
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="livraison.css">
        <meta charset="utf-8">
        <style>
            .log{
                width: 225px;
                color: white;
                background-color: #EA454C;
                border-radius: 5px;
                border-color: rgb(207, 197, 197);
                margin-top: 20px;
                height: 25px;
            }
        </style>
    </head> 
    <body>
        <div id="contener">

            <div style="margin-top: 10px; padding-left: 10px;">
                <a href="index.php"><img src="image/h.png" alt="text-alternatif" style="width: 50px; height: 50px;"></a>
            </div>

            <div id="contenu">
                <div id="log">
                    <div id="ente">
                        <img src="image/galax.png" alt="" class="logo">
                        <h1 style="text-transform: uppercase; width: 600px; text-align: center;" >bienvenue chez Galaxy sport Equipement</h1>
                    </div>
                    <p style="color: red; text-align: center;"><?php if(isset($_GET['message'])){echo $_GET['message'];} ?></p>
                    <div id="form">
                        <form action="" method="post" >
                            <div class="inp">
                                <label for="mail">Lieu de livraison</label>
                                <br><input type="text" placeholder="Entrer votre lieu de livraison" id="lieu" name="lieu">
                            </div>
                            <div class="inp">
                                <label for="password">Numero à jouindre</label>
                                <br><input type="text" placeholder="6*********" id="num" name="numerojouindre">
                            </div>
    
                            <div>
                                <input class="log" type="submit" style="font-size: medium; cursor: pointer;" name="envoyer" value="Valider" onclick="validation()">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="img">
                <img src="image/Service de livraison, trottinette vintage _ Vecteur Premium.jpeg" alt="text-alternatif" style="height: 80%;">
            </div>
        </div>

        <script>
            function validation () {
                var mail = document.getElementById('mail').value;
                var num = document.getElementById('num').value;

                if (!mail) {
                alert("veillez indiquer votre adresse")
                }
                if (!num) {
                alert("veillez indiquer votre numero")
                }
            }
        </script>
    </body>
</html>