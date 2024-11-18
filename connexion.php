<?php

    session_start();

   include 'config.php';

   try{

   if(isset($_POST["envoyer"])){
      $email = $_POST["email"];
      $password = $_POST["password"];

   
      $stmt = $con->prepare("SELECT * FROM utilisateur WHERE email = ? AND motpasse = ? ");
      $stmt->execute(array($email, $password));


      if($stmt->rowCount() == 0){
        $row = $stmt->fetch();
        header("location: connexion.php?error=Ce compte d'utilisateur n'existe pas");
      }else if($stmt->rowCount() == 1){
            $stmt1 = $con->prepare("SELECT * FROM utilisateur WHERE email = '$email'");
            $stmt1->execute();
            $row1 = $stmt1->fetch();
            $_SESSION['iduser'] = $row1['iduser'];
            $_SESSION['email'] = $row1["email"];
        header("location: index.php");
      }
      
   
    //   header('location: index.php');
   
   }

}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}

?> 





<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="inscript.css">
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
            #contener{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                width: 80%;
                height: 94%;
                background-color:#F8F8F8 ;
            }
            #contenu{
                background-color: #F8F8F8;
                width: 50%;
                padding: 5% 8%;
            }
            #img{
                height: 99.5vh;
                width: 50%;
                margin-left: 40px;
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

                    <div id="form">
                        <form action="connexion.php" method="post" >
                            <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                            <div class="inp">
                                <label for="mail">Email</label>
                                <br><input type="email" placeholder="Entrer votre email" id="mail" name="email">
                            </div>
                            <div class="inp">
                                <label for="password">Mot de passe</label>
                                <br><input type="password" placeholder="**********" id="password" name="password">
                            </div>
    
                            <div>
                                <input class="log" type="submit" style="font-size: medium; cursor: pointer;" value="Se connecter" name="envoyer" onclick="validation()">
                            </div>
    
                            <div>
                                <p style="font-size: small;">Vous n'avez pas de compte ? <span><a href="inscription.php" style="text-decoration: none; color: #EA454C;">Créer un compte</a></span></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="img">
                <img src="image/login.png" alt="text-alternatif" style="height: 100%;">
            </div>
        </div>

        <script>
            function validation () {
                var mail = document.getElementById('mail').value;
                var password = document.getElementById('password').value;

                if (!mail) {
                alert("veillez indiquer votre adresse email")
                }
                if (!password) {
                alert("veillez indiquer votre mot de passe")
                }
            }
        </script>
    </body>
</html>