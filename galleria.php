<!DOCTYPE html>
<?php
//buzz cut //french crop //curtains cut //Side Part Cut //MOHAWK cut
session_start(); 
$_SESSION['redirect']=null;
require "database/id.php";  
if(isset($_SESSION['username']))
    $id=getId($_SESSION['username']);  
else
    $id="a";
?>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Galleria</title>
    <link rel="stylesheet" type="text/css" href="CSS/galleria.css">
    <script src="script/galleria.js" crossorigin="anonymous"></script> 
</head>
<body>
    <?php require "header.php"; ?>
    <div style="height: 100px"></div>
    <div class="sezione1">
        <h1 id="gallery">I NOSTRI TAGLI</h1>
        <?php echo "<button id='aggiungi' class='addbutt' onclick='preferenze($id)'>Aggiungi Preferenza</button>"; ?>
    </div>
    

    <div class="gallery" >
        <div class="gal-1">
            <div class="galint">
                <button class="category active" id="all" onclick="dispAll()" href="#gallery" >ALL</button>
                <button class="category"  id="buzz" onclick="stile(event)" href="#gallery">BUZZ CUT</button>
                <button class="category"  id="french" onclick="stile(event)" href="#gallery">FRENCH CROP</button>
                <button class="category"  id="curtains" onclick="stile(event)">CURTAINS</button>
                <button class="category"  id="side" onclick="stile(event)">SIDE PART</button>
                <button class="category"  id="mohawk" onclick="stile(event)">MOHAWK</button>
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
</body>
</html>