<!DOCTYPE html>
<?php
session_start(); 
$_SESSION['redirect']=null;  //lo fa ogni pagina a eccezione di autenticazione.php  
require "database/id.php";  
$id_utente = isset($_SESSION['username']) ? getId($_SESSION['username']) : 0;
?>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Galleria</title>
    <link rel="stylesheet" type="text/css" href="CSS/galleria.css">
    <script src="https://kit.fontawesome.com/4a7d362a80.js" crossorigin="anonymous"></script> 
    <link rel="icon" href="img/icon.png" type="image/png"/>
</head>
<body>
    <?php require "header.php"; ?>
    <div style="height: 100px"></div> <!-- placeholder per riempire lo spazio dell'header -->
    <h1>I NOSTRI TAGLI</h1>
    <div class="gallery" id="galleria">
        <div class="gal-1">
            <div class="galint">  <!-- flex verticale per le categorie -->
                <div class="flex"> <!-- flex orizzontale per affiancare le stelle (preferenze) -->
                    <button class="category active" id="all" onclick="showAll()" href="#gallery" >ALL</button>
                </div>
                <div class="flex">
                    <button class="category"  id="buzz" onclick="stile(event)" href="#gallery">BUZZ CUT</button>
                    <i id="star_1" class="star fa" onclick="gestisciPreferenza(<?php echo $id_utente; ?>,event)"></i>
                </div>
                <div class="flex">
                    <button class="category"  id="french" onclick="stile(event)" href="#gallery">FRENCH CROP</button>
                    <i id="star_2" class="star fa" onclick="gestisciPreferenza(<?php echo $id_utente; ?>,event)"></i>
                </div>
                <div class="flex">
                    <button class="category"  id="curtains" onclick="stile(event)">CURTAINS</button>
                    <i id="star_3" class="star fa" onclick="gestisciPreferenza(<?php echo $id_utente; ?>,event)"></i>
                </div>
                <div class="flex">
                    <button class="category"  id="side" onclick="stile(event)">SIDE PART</button>
                    <i id="star_4" class="star fa" onclick="gestisciPreferenza(<?php echo $id_utente; ?>,event)"></i>
                </div>
                <div class="flex">
                    <button class="category"  id="mohawk" onclick="stile(event)">MOHAWK</button>
                    <i id="star_5" class="star fa" onclick="gestisciPreferenza(<?php echo $id_utente; ?>,event)"></i>
                </div>
            </div>
        </div>
        <div class="gal-2">
            <?php 
                $stili = array("BUZZ CUT","FRENCH CROP","CURTAINS","SIDE PART","MOHAWK");
                $stili_classi = array("buzz","french","curtains","side","mohawk");
                for($i = 0; $i<5; $i++)
                    for($j = 1; $j<6; $j++)
                        echo '<img  class="galimg '.$stili_classi[$i].'" src="img/gallery/'.$stili[$i].'/img'.$j.'.jpg" >' ;

            ?>
        </div>
    </div>
    <?php require "footer.php"; ?>

    <script src="script/galleria.js"></script> 
    <?php
    if(isset($_SESSION["username"])){
        ?>
        <script> //se loggato mostra le stelle (preferenze) al caricamento della pagina
            var id_utente = "<?php echo $id_utente; ?>";
            mostra(id_utente);  
        </script>
        <?php
    }
    ?>

    <div class="popup-sfondo" id="popup-prenota">
        <div class="popup-contenuto">
            <div class="chiudiflex"><span class="popup-chiudi" onclick="chiudiPopup()">&#215;</span></div>
            <p id="prefMax">Hai già selezionato tre preferenze.</p> 
        </div>
    </div>  
    
</body>
</html>