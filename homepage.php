<!DOCTYPE html>
<?php
session_start();
$_SESSION['redirect']=null;  //lo fa ogni pagina a eccezione di autenticazione.php  
require "database/homepage.php";
require "database/id.php";
$id_utente = isset($_SESSION['username']) ? getId($_SESSION['username']) : 0;
?>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Homepage</title>
    <link rel="icon" href="img/icon.png" type="image/png"/>
    
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <script src="https://kit.fontawesome.com/bdeddbfb58.js" crossorigin="anonymous"></script>
    <script defer src="script/homepage.js"></script>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhb5BVVHcIArfuJCj79LeG87fZyoPPnfQ&loading=async&callback=geoloc&libraries=marker"> //geoloc viene eseguito al termine del parse dell'intera pagina grazie a defer
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

        <div class="barbieri">
            <div class="barbiere" id="sing1">
                <span class="barber_title">BARBIERE</span>
                <span class="barber_name">Andrea</span>
            </div>
            <div class="barbiere" id="sing2">
                <span class="barber_title">BARBIERE</span>
                <span class="barber_name">Francesco</span>
            </div>
            <div class="barbiere" id="sing3">
                <span class="barber_title">BARBIERE</span>
                <span class="barber_name">Rocco</span>
            </div>
        </div>

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
                        <li><i class="fa-sharp fa-solid fa-phone icona"></i><span class="lista">0828 3091403</span></li>
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
                    <h2 class="name">Rifinitura Barba</h2>
                    <h2 class="price">$7.00</h2>
                    <p>Ottieni una rifinitura della barba perfetta dai nostri esperti barbieri. Con precisione e cura, modelleremo la tua barba per mostrare al meglio la tua personalità distintiva.</p>
                </div>

                <div class="single_service">
                    <h2 class="name">Taglio Classico + Barba</h2>
                    <h2 class="price">$15.00</h2>
                    <p>Mantieni un aspetto impeccabile con il nostro servizio completo. I nostri esperti barbieri si prenderanno cura di ogni dettaglio per garantire che tu esca dal nostro salone con un look curato e alla moda.</p>
                </div>

            </div>
            <div class="col-2">
                <div class="single_service">
                    <h2 class="name">Taglio Bambino</h2>
                    <h2 class="price">$10.00</h2>
                    <p>Porta i tuoi piccoli nel nostro salone per un taglio di capelli personalizzato. I nostri barbieri esperti sapranno mettere a proprio agio i bambini mentre li aiutano a ottenere uno stile che li farà sentire al meglio.</p>
                </div>

                <div class="single_service">
                    <h2 class="name">Shampoo e Trattamenti</h2>
                    <h2 class="price">$10.00</h2>
                    <p>Rilassati e lascia che i nostri esperti si prendano cura dei tuoi capelli con i nostri trattamenti shampoo e condizionanti. Utilizziamo prodotti di alta qualità per pulire, idratare e rivitalizzare i tuoi capelli.</p>
                </div>

                <div class="single_service">
                    <h2 class="name">Tinta per capelli</h2>
                    <h2 class="price">$20.00</h2>
                    <p>Esprimi te stesso e aggiungi un tocco di colore alla tua vita con il nostro servizio di tintura per capelli. I nostri professionisti ti garantiranno risultati bellissimi e duraturi su una vasta gamma di colori e sfumature.</p>
                </div>

            </div>

        </div>
    </section>

    <section class="sec_gallery">
        <h1>LE NOSTRE PROPOSTE</h1>
        <?php 
            if(isset($_SESSION["username"])){
                $stile=prelevaPreferenze($id_utente);
                $lunghezza=count($stile);
                if($lunghezza==0){
                    echo "<p>Ecco alcuni tagli che potrebbero piacerti. Aggiungi delle preferenze nella galleria per consigli più adatti a te</p>";
                }else{
                    echo "<p>In base alle tue preferenze, ecco alcuni tagli che potrebbero piacerti</p>";
                }
            } else {
                echo "<p>Ecco alcuni tagli che potrebbero piacerti. Registrati e aggiungi delle preferenze per consigli più adatti a te</p>";
            }
        ?>
        <div class="galleria">
            <div class="galleria_in">
            <?php 
            if(isset($_SESSION["username"])){
                    if($lunghezza==0){
                        nessunaPreferenza();
                    }else{
                        contenutiPersonalizzati($stile,$lunghezza);
                    }
            } else {
                    nessunaPreferenza();
            }
            ?>
            </div>
            <div class="freccia dietro"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="freccia avanti"><i class="fa-solid fa-arrow-right"></i></div>
        </div>
    </section>

    <section class="recensioni">
        <h1>COSA PENSANO DI NOI</h1>
        <hr>
        <h2>4.7</h2>
        <div class="starbox ">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
        </div>
        <span id="numrecensioni">su 65 recensioni</span>
        <div class="recensionibox">
            <div class="recensionicard">
                <span class="spanrecensioni">Gentlemen's Cut offre un'esperienza di rasatura di alto livello.</span>
                <br>
                <i class="fa-sharp fa-solid fa-quote-right"></i>
                <br>
                <div class="divprofilo">
                    <img class="profilo" src="img/profilo.jpg" alt="">
                    <span>Francesco Spinelli</span>
                </div>
                
            </div>
            <div class="recensionicard">
                <span class="spanrecensioni">L'ambiente elegante e l'attenzione ai dettagli mi hanno fatto sentire veramente apprezzato.</span>
                <br>
                <i class="fa-sharp fa-solid fa-quote-right"></i>
                <br>
                <div class="divprofilo">
                    <img class="profilo" src="img/profilo.jpg" alt="">
                    <span>Andrea Tudino</span>
                </div>
            </div>
            <div class="recensionicard">
                <span class="spanrecensioni">Il personale è competente e meticoloso, garantendo tagli e rifiniture impeccabili.</span>
                <br>
                <i class="fa-sharp fa-solid fa-quote-right"></i>
                <br>
                <div class="divprofilo">
                    <img class="profilo" src="img/profilo.jpg" alt="">
                    <span>Andrea Vicinanza</span>
                </div>
            </div>
            <div class="recensionicard">
                <span class="spanrecensioni">Gli stylist di Gentlemen's Cut sono aggiornati sulle ultime mode e sanno esattamente come personalizzare il servizio per adattarsi al tuo stile. </span>
                <br>
                <i class="fa-sharp fa-solid fa-quote-right"></i>
                <br>
                <div class="divprofilo">
                    <img class="profilo" src="img/profilo.jpg" alt="">
                    <span>Rocco Manna</span>
                </div>
            </div>
            <div class="recensionicard">
                <span class="spanrecensioni">Hanno sistemato la mia barba e i capelli in meno tempo del previsto, con risultati sorprendenti. Prezzi onesti per ciò che offrono.</span>
                <br>
                <i class="fa-sharp fa-solid fa-quote-right"></i>
                <br>
                <div class="divprofilo">
                    <img class="profilo" src="img/profilo.jpg" alt="">
                    <span>Andrey Kiriyanov</span>
                </div>
            </div>
            <div class="recensionicard">
                <span class="spanrecensioni">Oltre a un taglio eccellente, il personale ha offerto consigli utili su come mantenere il look. La cura del cliente qui va oltre il semplice appuntamento.</span>
                <br>
                <i class="fa-sharp fa-solid fa-quote-right"></i>
                <br>
                <div class="divprofilo">
                    <img class="profilo" src="img/profilo.jpg" alt="">
                    <span>Giuseppe Ruggiero</span>
                </div>
            </div>
        </div>
    </section>

    <?php require "footer.php"; ?> 

</body>
</html>