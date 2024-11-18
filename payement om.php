<?php
    session_start();

    include 'config.php';

    $iduser = $_SESSION['iduser'];

    $stmt = $con->prepare("SELECT * FROM produit_commander WHERE iduser = '$iduser'");
    $stmt->execute();

    $row = $stmt->fetch();

    $prixtotal = $_GET['prixtotal'];



?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="payement.css">

        <style>
            .carrousel {
                position: relative;
                max-width: 600px; 
                margin: auto;
                overflow: hidden;
            }

            .imgs {
                display: flex;
                flex-direction: row;
                transition: transform 0.5s ease-in-out;
                height: 300px; 
                width: 300px;
                margin-top: -20px;
            }
            .imgs img {
                width: 100%;
                height: auto;
            }
            .carrousel2{
                display: flex;
                flex-direction: row;
                margin-top: 25%;
            }
            .prev , .next{
                margin-top: 30%;
                position: absolute;
                top: 30%;
                color: white;
                border: none;
                font-size: 30px;
                padding: 10px;
                cursor: pointer;
                z-index: 10;
                transform: translateY(-50%);
            }
            .next{
                margin-left: 88%;
            }
            .prev{
                margin-left: -5%;
                margin-top: 39%;
            }
            .log{
                background-color: #f0932b;
                color: white;
                font-size: large;
                padding: 15px;
                border-radius: 10px;
                width: 150px;
                border-color: #f0932b;
            }
        </style>
    </head>
    <body>
        <div id="contener">
            <div style="padding: 2%;">
                <a href="index.php"><img src="image/white-home-icon-transparent-png-6 3.png"></a>
            </div>
            <div style="display: flex; justify-content: center;">
                <div id="contenu">
                    
                    <section id="photo">
                        <p style="color: #EA454C; text-align: center; font-size: large;">you're buying</p>
                        
                       
                        <div class="carrousel">
                            
                            <div class="carrousel2">
                                <img class="prev" src="image/Group 4.png" alt="text-alternatif" style="width: 30px; height: 30px;  cursor: pointer;">
                                <div class="imgs">
                                    <?php
                                        if($stmt->rowCount() == 0){ 

                                    ?>
                                    <?php
                                        }else{
                                        do{

                                    ?>
                                        <img src="image/<?php echo $row['imageproduit'] ?>" alt="" style="width:100% ;height:100%; object-fit: contain;">
                                    <?php
                                        }
                                        while($row = $stmt->fetch());
                                    }
                                    ?>
                                </div>
                                <img class="next" src="image/Group 4.png" alt="text-alternatif" style="width: 30px; height: 30px; cursor: pointer; transform: rotate(180deg) ">
            
                            </div>
                        </div>
    
                        <div style="color: black; text-transform: uppercase; text-align: center; display: flex; flex-direction: row; justify-content: space-around; margin-top: 20px;">
                            <h2>Total</h2>
                            <div id="calcul">
                                <h2><?php echo $prixtotal; ?> FCFA</h2>
                            </div>
                        </div>
                    </section>
            
                    <section id="form">
                        <form action="payement.php" method="post">
                            <div style="display: flex; flex-direction: row; justify-content: space-around;">
                                <h1 style="color: black; text-align: center;">INFORMATIONS DU PAYEMENT</h1>
                                <img src="image/R (5) 1.png" alt="text-alternatif" style="height: 30px; margin-top: 15px; object-fit: contain;" >
                            </div>
                            <div class="inp">
                                <label for="name">NOM</label>
                                <br><input type="text" id="name" name="nom" placeholder="Entrer votre nom">
                            </div>
            
                            <div class="inp">
                                <label for="number">NUMERO DE TELEPHONE</label>
                                <br><input type="text" id="number" name="numerotel" placeholder="6 ********">
                            </div>
            
                            <div class="code">
                                <label for="code">CODE</label>
                                <br><input type="password" name="code" id="code" placeholder="****">
                            </div>
            
                            <div class="pay">
                                <input class="log" type="submit" style="font-size: medium; cursor: pointer;" name="envoyer" value="PAY NOW" onclick="validation()">
                            </div>
            
                        </form>
                    </section>
                </div>
            </div>
        </div>
    
        <script>
            function validation () {
                var nom = document.getElementById('name').value;
                var number = document.getElementById('number').value;
                var code = document.getElementById('code').value;
    
                if (!nom) {
                alert("veillez indiquer votre nom")
                }
                if ((number.length < 9) || (number.length > 9)) {
                alert("le numéro est non valide")
                }
                if (code.length < 4) {
                    alert("code non valide ")
                }
            }
        </script>

        <script>
            let currentIndex = 0;
            const images = document.querySelectorAll(".imgs img");
            const totalImages = images.length;

            const prevButton = document.querySelector(".prev");
            const nextButton = document.querySelector(".next");

            function showImage(index) {
                if (index >= totalImages) {
                    currentIndex = 0;
                } else if (index < 0) {
                    currentIndex = totalImages - 1;
                } else {
                    currentIndex = index;
                }
                const offset = -currentIndex * 100; 
                document.querySelector(".imgs").style.transform = `translateX(${offset}%)`;
            }

            prevButton.addEventListener("click", () => {
                showImage(currentIndex - 1);
            });

            nextButton.addEventListener("click", () => {
                showImage(currentIndex + 1);
            });

            
            setInterval(() => {
                showImage(currentIndex + 1);
            }, 3000); 

        </script>
    </body>
</html>