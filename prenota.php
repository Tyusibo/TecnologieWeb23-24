<!DOCTYPE html>
<?php
session_start(); 
$_SESSION['redirect']=null;  
?>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Prenota</title>  
    <link rel="stylesheet" type="text/css" href="css/prenota.css">
    <?php require "condiviso.php"; ?>
</head>
<body>
    <?php require "header.php"; ?>
    <div style="height: 100px"></div>
    <?php
   
    echo "<h1>PRENOTA ORA</h1>";?>
    
    <div class="prenota_main">
        <h2>SCEGLI IL TUO BARBIERE</h2>
        <div class="barbieri">
            <button class="barbutton" id="andrea">Andrea</button>
            <button class="barbutton" id="rocco">Rocco</button>
            <button class="barbutton" id="francesco">Francesco</button>
        </div>
        <div class="date" id="datePicker" >
            <?php $data=date("Y-m-d"); /*fa vedere il formato giusto*/ ?>  
            <input type="date" onchange=orari() id="date" value="<?php echo $data ?>" name="data" min="<?php echo $data; ?>" max="<?php echo date('d-m-Y', strtotime('+1 week')); ?> " readonly>
            <span class="freccia" id="sinistra" onclick="precedente()">&#9664;</span>
            <span class="freccia" id="destra" onclick="prossimo()">&#9654;</span>
        </div>
        <div id="orari"></div> <!--Gli orari si possono gestire nel css con .orari ul-->

    </div>    

    
    <div class="popup-sfondo" id="popup-prenota">
        <div class="popup-contenuto">
            <span class="popup-chiudi" onclick="chiudiPopup()">X</span>
            <p style="margin-top: 50px">Per effettuare una prenotazione, è necessario autenticarsi.</p> 
            <p class="p-bottoni"><button class="barbutton no-margin" id="accedi">Accedi</button> <button class="barbutton no-margin" id="registrati">Registrati</button></p>
        </div>
    </div>  


    
    <div class="popup-sfondo" id="popup-prenotazione">
        <div class="popup-contenuto">
            <span class="popup-chiudi" onclick="chiudiPopupPrenota()">X</span>
            <p class="effettuata">Prenotazione effettuata con successo ✓</p>
            <p class="p-bottoni"><button class="barbutton no-margin black" onclick="chiudiPopupPrenota()">Nuova Prenotazione</button> <button class="barbutton no-margin black" onclick="redirectAccount()">Vedi Prenotazioni</button></p>
        </div>
	</div>

    <?php require "footer.php";?>
    <script src="pagineAusiliarie/redirect.js"></script>
    <script src="script/prenota.js"></script>


</body>
</html>