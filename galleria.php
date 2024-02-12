<!DOCTYPE html>
<?php
//buzz cut //french crop //curtains cut //Side Part Cut //MOHAWK cut
session_start(); 
$_SESSION['redirect']=null;  
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

    <h1 id="gallery">I NOSTRI TAGLI</h1>

    <div class="gallery" >
        <div class="gal-1">
            <div class="galint">
                <button class="category active" id="all" onclick="dispAll()" href="#gallery" >ALL</button>
                <button class="category"  id="buzzcat" onclick="buzz()" href="#gallery">BUZZ CUT</button>
                <button class="category"  id="frenchcat" onclick="french()" href="#gallery">FRENCH CROP</button>
                <button class="category"  id="curtainscat" onclick="curtains()">CURTAINS</button>
                <button class="category"  id="sidecat" onclick="side()">SIDE PART</button>
                <button class="category"  id="mohawkcat" onclick="mohawk()">MOHAWK</button>
            </div>
        </div>
        <div class="gal-2">
            <?php 
            
                for($i = 1; $i<6; $i++)
                    echo '<img  class="galimg buzz" id="buzz" src="img/gallery/img'.$i.'.jpg" >' ;
                for($i = 6; $i<11; $i++)
                    echo '<img  class="galimg french" id="french" src="img/gallery/img'.$i.'.jpg" >' ;
                for($i = 11; $i<16; $i++)
                    echo '<img  class="galimg curtains" id="curtains" src="img/gallery/img'.$i.'.jpg" >' ;
                for($i = 16; $i<21; $i++)
                    echo '<img  class="galimg side" id="side" src="img/gallery/img'.$i.'.jpg" >' ;
                for($i = 21; $i<26; $i++)
                    echo '<img  class="galimg mohawk" id="mohawk" src="img/gallery/img'.$i.'.jpg" >' ;

            ?>
        </div>
    </div>









    <?php require "footer.php"; ?>
</body>
</html>