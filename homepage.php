<!DOCTYPE html>
<?php
session_start();
$_SESSION['redirect']=null;  //lo fa ogni pagina a eccezione di autenticazione.php  
require "database/homepage.php";
?>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Homepage</title>
    
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <script src="https://kit.fontawesome.com/bdeddbfb58.js" crossorigin="anonymous"></script>
    <script defer src="script/homepage.js"></script>
    <script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhb5BVVHcIArfuJCj79LeG87fZyoPPnfQ&callback=geoloc"> //geoloc viene eseguito al termine del parse dell'intera pagina grazie a defer
    </script>
</head>

<body>

<?php require "header.php"; ?>

    <section class="home" id="home" >
        <div class="div_home">
            <h1 id="welcome">Benvenuto da Gentlemen's Cut</h1>
            <h2 class="welcome2">"Dove l'eleganza incontra la precisione"</h2>
            <a href="prenota.php" class="btn">
                <span>Prenota Subito</span>
            </a>
        </div>
    </section>

    
    <section class="chiSiamo" id="chiSiamo">
        <h1>CHI SIAMO</h1>
        <p>
            "Siamo un team di barbieri appassionati, dedicati a trasformare ogni taglio in un'opera d'arte."
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
                    <h2 class="price">$12.00</h2>
                    <p>Goditi un taglio di capelli senza tempo con il nostro servizio di taglio classico. I nostri esperti barbieri lavoreranno con cura per darti uno stile fresco e pulito che si adatti alla tua personalità e al tuo stile di vita.</p>
                </div>

                <div class="single_service">
                    <h2 class="name">Taglio Classico + Barba</h2>
                    <h2 class="price">$20.00</h2>
                    <p>Rilassati e concediti il lusso di un taglio di capelli e una cura della barba con il nostro servizio combinato. Lascia che i nostri professionisti curino sia i tuoi capelli che la tua barba per un aspetto impeccabile e curato da capo a piedi.</p>
                </div>

                <div class="single_service">
                    <h2 class="name">Taglio Classico + Rifinitura Barba</h2>
                    <h2 class="price">$15.00</h2>
                    <p>Mantieni un aspetto impeccabile con il nostro servizio che combina un taglio di capelli classico con una rifinitura della barba. I nostri esperti barbieri si prenderanno cura di ogni dettaglio per garantire che tu esca dal nostro salone con un look fresco e curato.</p>
                </div>

            </div>
            <div class="col-2">
                <div class="single_service">
                    <h2 class="name">Taglio Bambino</h2>
                    <h2 class="price">$10.00</h2>
                    <p> Porta i tuoi piccoli nel nostro salone per un taglio di capelli personalizzato. I nostri barbieri esperti sapranno mettere a proprio agio i bambini e li coccoleranno mentre li aiutano a ottenere uno stile che li farà sentire al meglio.</p>
                </div>

                <div class="single_service">
                    <h2 class="name">Shampoo e Trattamenti</h2>
                    <h2 class="price">$10.00</h2>
                    <p>Rilassati e lascia che i nostri esperti si prendano cura dei tuoi capelli con i nostri trattamenti shampoo e condizionanti. Utilizziamo prodotti di alta qualità per pulire, idratare e rivitalizzare i tuoi capelli per un aspetto sano e brillante.</p>
                </div>

                <div class="single_service">
                    <h2 class="name">Tinta per capelli</h2>
                    <h2 class="price">$20.00</h2>
                    <p>Esprimi te stesso e aggiungi un tocco di colore alla tua vita con il nostro servizio di tintura per capelli. Dai un tocco di originalità al tuo stile con una vasta gamma di colori e sfumature per adattarsi alla tua personalità unica. I nostri professionisti ti guideranno attraverso il processo per garantire risultati bellissimi e duraturi.</p>
                </div>

            </div>

        </div>
    </section>

    <section class="sec_gallery">
        <h1>LE NOSTRE PROPOSTE</h1>
        <?php 
            if(isset($_SESSION["username"])){
                echo "<p>In base alle tue preferenze, ecco alcuni tagli che potrebbero piacerti</p>";
                echo "<p>Loggato ma non hai preferenze</p>";
            } else {
                echo "<p>Non loggato</p>";
            }
        ?>
        <div class="galleria">
            <div class="galleria_in">
            <?php 
            if(isset($_SESSION["username"])){
                    contenutiPersonalizzati($_SESSION["username"]);
            } else {
                    nessunaPreferenza();
            }
            ?>
            </div>
            <div class="freccia dietro"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="freccia avanti"><i class="fa-solid fa-arrow-right"></i></div>
        </div>
    </section>

    <?php require "footer.php"; ?> 

</body>
</html>