<!DOCTYPE html>
<?php
//buzz cut //french crop //curtains cut //Side Part Cut //MOHAWK cut
session_start(); 
$_SESSION['redirect']=null;  //lo fa ogni pagina a eccezione di autenticazione.php  
require "database/id.php";  
if(isset($_SESSION['username']))
    $id=getId($_SESSION['username']);
else
    $id='a';
?>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Galleria</title>
    <link rel="stylesheet" type="text/css" href="CSS/galleria.css">
    <script src="https://kit.fontawesome.com/4a7d362a80.js" crossorigin="anonymous"></script> 
</head>
<body>
    <div class="header">
        <?php require "header.php"; ?>
    </div>
    <div style="height: 100px"></div>
    <div class="sezione1">
        <h1 id="gallery">I NOSTRI TAGLI</h1>
    </div>
    <div class="gallery" id="galleria">
        <div class="gal-1">
            <div class="galint" id="prova">
                <div class="flex">
                    <button class="category active" id="all" onclick="dispAll()" href="#gallery" >ALL</button>
                </div>
                <div class="flex">
                    <button class="category"  id="buzz" onclick="stile(event)" href="#gallery">BUZZ CUT</button>
                    <i id="star_1" class="star fa" onclick="gestisciPreferenza(<?php echo $id; ?>,event)"></i>
                </div>
                <div class="flex">
                    <button class="category"  id="french" onclick="stile(event)" href="#gallery">FRENCH CROP</button>
                    <i id="star_2" class="star fa" onclick="gestisciPreferenza(<?php echo $id; ?>,event)"></i>
                </div>
                <div class="flex">
                    <button class="category"  id="curtains" onclick="stile(event)">CURTAINS</button>
                    <i id="star_3" class="star fa" onclick="gestisciPreferenza(<?php echo $id; ?>,event)"></i>
                </div>
                <div class="flex">
                    <button class="category"  id="side" onclick="stile(event)">SIDE PART</button>
                    <i id="star_4" class="star fa" onclick="gestisciPreferenza(<?php echo $id; ?>,event)"></i>
                </div>
                <div class="flex">
                    <button class="category"  id="mohawk" onclick="stile(event)">MOHAWK</button>
                    <i id="star_5" class="star fa" onclick="gestisciPreferenza(<?php echo $id; ?>,event)"></i>
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
    <script src="script/galleria.js"></script> 
    <div id="footer">
        <?php require "footer.php"; 
        if(isset($_SESSION["username"])){
            ?>
            <script>
                var id_utente = "<?php echo $id; ?>";
                mostra(id_utente);
            </script>
            <?php
        }
        ?>
    </div>
    
</body>

<script defer>
    /* window.addEventListener('scroll', scrollFunction);

    function scrollFunction() {
        var footer = document.getElementById("footer");
        var menu = document.querySelector('.galint');
        var header = document.querySelector('.header');
        var distance = footer.getBoundingClientRect().top + 250;
        
        console.log(distance);
        console.log(window.pageYOffset)

        if (window.innerHeight > distance) {
            menu.style.position = "fixed";
            menu.style.bottom = (footer.offsetHeight - 50) + "px"; // Aggiungi un po' di spazio tra il menu e il footer
        } else {
            menu.style.position = "fixed";
            menu.style.bottom = "initial";
        }
    } */

    /* document.addEventListener("scroll", function() {
    var scrollPosition = window.scrollY || document.documentElement.scrollTop;
    var fixedElement = document.querySelector('.galint');
    var stopPoint = 2935;
    var altezza = document.getElementById('galleria').offsetHeight;

    if (scrollPosition >= stopPoint) {
        fixedElement.style.position = 'absolute';
        fixedElement.style.top = (stopPoint + 265) + 'px'; // Fissa l'elemento al punto di stop
    } else {
        fixedElement.style.position = 'fixed';
        fixedElement.style.top = '265px'; // Distanza originale dall'alto quando segue lo scroll
    }
}); */

document.addEventListener("scroll", function() {
    var scrollPosition = window.scrollY || document.documentElement.scrollTop;
    var fixedElement = document.querySelector('.galint');
    var div = document.getElementById('galleria');
    var stopPoint = (div.offsetHeight - 400);
    

    if (scrollPosition >= stopPoint) {
        fixedElement.style.position = 'absolute';
        fixedElement.style.top = (stopPoint + 265) + 'px'; // Fissa l'elemento al punto di stop
    } else {
        fixedElement.style.position = 'fixed';
        fixedElement.style.top = '265px'; // Distanza originale dall'alto quando segue lo scroll
    }
});

</script>
</html>