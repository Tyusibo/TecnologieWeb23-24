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
    <script defer src="script/galleria.js"></script> 
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
</html>