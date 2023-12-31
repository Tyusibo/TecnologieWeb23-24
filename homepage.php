<!DOCTYPE html>
<?php
session_start();
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

<body style="padding: 0px;">

<script src="script/caricaHeader.js"></script>
<script src="script/caricaMappa.js"></script>
    <section style="margin-top: -100px;" class="home" id="home" >
        <div class="overlay"></div>
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
                <h3>IL TUO LOOK IMPECCABILE INIZIA QUI</h3>
                <p style="text-align: left">Da Gentlemen's Cut, troverai persone cordiali e talentuose, un'ampia offerta di servizi di grooming e un bar completamente fornito.</p>
                <ul>
                    <li><i class="fa-sharp fa-solid fa-location-dot icona"></i><span class="lista">Viale della Conoscenza, Fisciano, 84084</span></li>
                    <li><i class="fa-sharp fa-solid fa-phone icona"></i><span class="lista">0828 371360</span></li>
                    <li><i class="fa-sharp fa-solid fa-clock icona"></i><span class="lista"></span></li>
                </ul>
                <a href="#" class="btn"><span>Contattaci</span></a>
            </div>

            <div class="mapImg">
                <div id="map"></div>
            </div>
            
        </div>
    </section>


    <section class="servizi" id="servizi">
        <div class="cut" id="cut">
            <h2>Taglio $40</h2>
            <p>Solo stili tradizionali a taglio corto che includono: dissolvenze e rastremazioni che iniziano da 1 o più con un leggero 
                lavoro a forbice sulla parte superiore; pettinati; tagli all'equipaggio; pompadour. Rasatura della nuca con schiuma calda 
                inclusa e abbinata al prodotto su richiesta. Non include lo shampoo.</p>
        </div>
        <div class="beradcut" id="beardcut">
            <h2>Taglio Barba $40</h2>
                <p>Barba tagliata e modellata; linea di schiuma calda e rasoio a mano libera, rasatura del collo e della nuca. Include un trattamento 
                    rilassante con asciugamano caldo e l'applicazione del prodotto.</p>
        </div>
        <div class="buzzcut">
            <h2>Buzz Cut $25</h2>
            <p>Same clipper length all the way around. No blending or scissor work. Hot lather nape shave included. Does not include shampoo.</p>
        </div>
        <div class="shave" id="shave">
            <h2>Shave $40</h2>
            <p>Full face or scalp straight razor shave with hot lather. Includes a relaxing hot towel treatment and product application.</p>
        </div>
        <div class="trasformation" id="trasformation">
            <h2>Trasformation $80</h2>
            <p>Shoulder length or longer chopped off for a whole new look. Styled with product upon request. Shampoo included upon request.</p>
        </div>
    </section>
    


    <script src="script/caricaFooter.js"></script>
    
</body>
</html>