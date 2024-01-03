<!DOCTYPE html>
<?php
session_start();
$_SESSION['redirect']=null;
if ($_SERVER["REQUEST_METHOD"] === 'GET') {  /*tramite form con metodo get capisco se reindirizzare al login o
    alla registrazione e imposto redirect per tornare alla homepage dopo il login/la registrazione*/
    if (isset($_GET['accedi'])) {
           $_SESSION['redirect']="homepage.php#galleria"; 
            header("Location: account.php");
    } 
    if (isset($_GET['registrati'])) {
        $_SESSION['redirect']="homepage.php#galleria"; 
         header("Location: registrati.php");
 }    
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
    <script src="script/caricaMappa.js"></script>
</head>

<body>

<?php require "header.html"; ?>

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
                <h3>IL TUO LOOK IMPECCABILE INIZIA QUI</h3>
                <p style="text-align: left">Da Gentlemen's Cut, troverai persone cordiali e talentuose, un'ampia offerta di servizi di grooming e un bar completamente fornito.</p>
                <ul>
                    <li><i class="fa-sharp fa-solid fa-location-dot icona"></i><span class="lista">Viale della Conoscenza, Fisciano, 84084</span></li>
                    <li><i class="fa-sharp fa-solid fa-phone icona"></i><span class="lista">0828 371360</span></li>
                    <li><i class="fa-sharp fa-solid fa-clock icona"></i><span class="lista">Lunedì: Chiuso <br>
                                                                                            Martedì-Sabato: 9:00 - 19:00 <br>
                                                                                            Domenica: Chiuso</span></li>
                </ul>
                <a href="#" class="bottone"><span>Contattaci Ora</span></a>
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

    <section id="galleria" class="galleria">
        <?php if(empty($_SESSION['username'])){ /* se non sei loggato vedi i contenuti di default */
            echo "<p>Ciao, per una galleria personalizzata accedi al tuo"; ?> 
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="GET"><input type="submit" id="accedi" name="accedi" value="account"></form>oppure
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="GET"><input type="submit" id="registrati" name="registrati" value="registrati">  
            </form>
            <h1>GALLERIA</h1>
            <div class="test">
                <img src="img/barber_bg.jpeg" alt="Immagine 1">
                <img src="img/barber_bg.jpeg" alt="Immagine 2">
                <img src="img/barber_bg.jpeg" alt="Immagine 3">
                <img src="img/barber_bg.jpeg" alt="Immagine 4">
                <img src="img/barber_bg.jpeg" alt="Immagine 5">
                <img src="img/barber_bg.jpeg" alt="Immagine 6">
                <img src="img/barber_bg.jpeg" alt="Immagine 7">
                <img src="img/barber_bg.jpeg" alt="Immagine 8">
                <img src="img/barber_bg.jpeg" alt="Immagine 9">
            </div>
        <?php } else { /* se sei loggato vedi i contenuti personalizzati */
            echo "<p>Ciao $_SESSION[username]! Ecco di seguito i tuoi contenuti personalizzati, puoi esprimere le tue preferenze sulla
            pagina dedicata al tuo <a href=account.php>account</a>"; ?>
            <div class="test">
            <img src="img/barber_bg.jpeg" alt="Immagine 1">
            <img src="img/barber_bg.jpeg" alt="Immagine 2">
            <img src="img/barber_bg.jpeg" alt="Immagine 3">
            <img src="img/barber_bg.jpeg" alt="Immagine 4">
            <img src="img/barber_bg.jpeg" alt="Immagine 5">
            <img src="img/barber_bg.jpeg" alt="Immagine 6">
            <img src="img/barber_bg.jpeg" alt="Immagine 7">
            <img src="img/barber_bg.jpeg" alt="Immagine 8">
            <img src="img/barber_bg.jpeg" alt="Immagine 9">
        </div>
        <?php } /* chiudo la parentesi dell'else */ ?> 
    </section>
    <?php require "footer.html"; ?> 
</body>
</html>