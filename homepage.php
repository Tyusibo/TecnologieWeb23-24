<!DOCTYPE html>
<?php
session_start(); //avvio la sessione
$_SESSION['redirect']=null;  //valore di default che mi fa capire che in autenticazione.php non devo fare redirect particolari
$_SESSION['change']=false;  //valori di default che mi fa capire che in autenticazione.php devo mostrare la parte del 
//login e non quella della registrazione(true)
//entrambe le variabili non vengono alterate in autenticazione.php ma vengono inizializzate in ogni altra pagina
if (isset($_GET['accedi'])) {
    $_SESSION['redirect']="homepage.php"; 
    header("Location: autenticazione.php");
} 
if (isset($_GET['registrati'])) {
    $_SESSION['redirect']="homepage.php"; 
    header("Location: autenticazione.php");
    $_SESSION['change']=true;
} 
?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Homepage</title>
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <script src="https://kit.fontawesome.com/bdeddbfb58.js" crossorigin="anonymous"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhb5BVVHcIArfuJCj79LeG87fZyoPPnfQ&callback=initMap">
    </script>
    
</head>

<body>

<?php require "header.php"; ?>

    <section class="home" id="home" >
        <div class="div_home">
            <h1 id="welcome">Benvenuto da Gentlemen's Cut</h1>
            <h2 class="welcome2">"Dove l'eleganza incontra la precisione"</h2>
            <a href="#" class="btn">
                <span>Prenota Subito</span>
            </a>
        </div>
    </section>

    
    <section class="chiSiamo" id="chiSiamo">
        <h1>CHI SIAMO</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        </p>

        <hr>

        <div class="row">

            <div class="content">

                <div class="verticalflex">
                    <h3>IL TUO LOOK IMPECCABILE INIZIA QUI</h3>
                    <p style="text-align: left">Da Gentlemen's Cut, troverai persone cordiali e talentuose, un'ampia offerta di servizi di grooming e un bar completamente fornito.</p>
                </div>

                <div class="verticalflex">
                    <ul>
                        <li><i class="fa-sharp fa-solid fa-location-dot icona"></i><span class="lista">Viale della Conoscenza, Fisciano, 84084</span></li>
                        <li><i class="fa-sharp fa-solid fa-phone icona"></i><span class="lista">0828 371360</span></li>
                        <li><i class="fa-sharp fa-solid fa-clock icona"></i><span class="lista">Lunedì: Chiuso <br>
                                                                                                Martedì-Sabato: 9:00 - 19:00 <br>
                                                                                                Domenica: Chiuso</span></li>
                    </ul>
                    <a href="#" class="bottone"><span>Contattaci Ora</span></a>
                </div>
            </div>

            <div class="mapImg">
                <div id="map"></div>
            </div>
            
        </div>
    </section>


    <section class="servizi" id="servizi">
        <h1>SERVIZI</h1>
        <div class="div_serv">
            <div class="col-1">
                <div class="single_service">
                    <h2 class="name">Taglio Classico</h2>
                    <h2 class="price">$30.00</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque provident, magni voluptatibus doloribus nisi minima ab pariatur suscipit voluptates cum vitae possimus ad. Accusamus similique voluptate suscipit assumenda rerum?</p>
                </div>

                <div class="single_service">
                    <h2 class="name">Taglio Classico</h2>
                    <h2 class="price">$30.00</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque provident, magni voluptatibus doloribus nisi minima ab pariatur suscipit voluptates cum vitae possimus ad. Accusamus similique voluptate suscipit assumenda rerum?</p>
                </div>

                <div class="single_service">
                    <h2 class="name">Taglio Classico</h2>
                    <h2 class="price">$30.00</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque provident, magni voluptatibus doloribus nisi minima ab pariatur suscipit voluptates cum vitae possimus ad. Accusamus similique voluptate suscipit assumenda rerum?</p>
                </div>

            </div>
            <div class="col-2">
                <div class="single_service">
                    <h2 class="name">Taglio Classico</h2>
                    <h2 class="price">$30.00</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque provident, magni voluptatibus doloribus nisi minima ab pariatur suscipit voluptates cum vitae possimus ad. Accusamus similique voluptate suscipit assumenda rerum?</p>
                </div>

                <div class="single_service">
                    <h2 class="name">Taglio Classico</h2>
                    <h2 class="price">$30.00</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque provident, magni voluptatibus doloribus nisi minima ab pariatur suscipit voluptates cum vitae possimus ad. Accusamus similique voluptate suscipit assumenda rerum?</p>
                </div>

                <div class="single_service">
                    <h2 class="name">Taglio Classico</h2>
                    <h2 class="price">$30.00</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo eaque provident, magni voluptatibus doloribus nisi minima ab pariatur suscipit voluptates cum vitae possimus ad. Accusamus similique voluptate suscipit assumenda rerum?</p>
                </div>

            </div>

        </div>
    </section>

    <section class="sec_gallery">
        <h1>LE NOSTRE PROPOSTE</h1>
        <div class="galleria">
            <div class="galleria_in">
                <img src="img/barber_bg.jpeg" alt="Immagine 1">
                <img src="img/barber_bg.jpeg" alt="Immagine 2">
                <img src="img/barber_bg.jpeg" alt="Immagine 3">
                <img src="img/barber_bg.jpeg" alt="Immagine 4">
                <img src="img/barber_bg.jpeg" alt="Immagine 5">
                <img src="img/barber_bg.jpeg" alt="Immagine 6">
            </div>
            <div class="freccia dietro"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="freccia avanti"><i class="fa-solid fa-arrow-right"></i></div>
        </div>
    </section>

    <script src="script/galleria.js"></script>
    <script src="script/homepage.js"></script>
    <?php require "footer.php"; ?> 

</body>
</html>