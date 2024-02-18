<!DOCTYPE html>
<?php
session_start(); 
$_SESSION['redirect']=null;   //lo fa ogni pagina a eccezione di autenticazione.php 
require "database/id.php"; 
if(isset($_SESSION['username']))
    $id=getId($_SESSION['username']);
else
    $id=0;  //serve per far capire agli script php che l'utente non è loggato
?>
<html lang="it" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Prenota</title>  
    <link rel="stylesheet" type="text/css" href="css/prenota.css">
</head>
<body>
    <?php require "header.php"; ?>
    <div style="height: 100px"></div>
        <h1>PRENOTA ORA</h1>;
    <div class="prenota_main">
        <h2>SCEGLI IL TUO BARBIERE</h2>
        <div class="barbieri">
            <button onclick="mostraData('andrea', <?php echo $id; ?>)" class="barbutton" id="andrea">Andrea</button>
            <button onclick="mostraData('rocco',<?php echo $id; ?>)"class="barbutton" id="rocco">Rocco</button>
            <button onclick="mostraData('francesco',<?php echo $id; ?>)"class="barbutton" id="francesco">Francesco</button>
        </div>
        <div class="date" id="datePicker">
            <?php $data=date("Y-m-d"); ?>  
            <input type="date" onchange="orari(<?php echo $id; ?>)" id="date" value="<?php echo $data; ?>" name="data" min="<?php echo $data; ?>" readonly>
            <span class="freccia" id="sinistra" onclick="precedente()">&#9664;</span>
            <span class="freccia" id="destra" onclick="prossimo()">&#9654;</span>
        </div>
        <div id="orari"></div>
    </div> 
    
    
    <div class="popup-sfondo" id="popup-prenota">
        <div class="popup-contenuto">
            <div class="chiudiflex"><span class="popup-chiudi" onclick="chiudiPopup()">&#215;</span></div>
            <p id="noLog">Per effettuare una prenotazione è necessario autenticarsi.</p> 
            <p class="p-bottoni"><button class="barbutton no-margin" id="accedi">Accedi</button> <button class="barbutton no-margin" id="registrati">Registrati</button></p>
        </div>
    </div>  


    
    <div class="popup-sfondo" id="popup-prenotazione">
        <div class="popup-contenuto">
            <div class="chiudiflex"><span class="popup-chiudi" onclick="chiudiPopupPrenota()">&#215;</span></div>
            <p class="effettuata">Prenotazione effettuata con successo ✓</p>
            <p class="p-bottoni"><button class="barbutton no-margin black" onclick="chiudiPopupPrenota()">Nuova Prenotazione</button> <button class="barbutton no-margin black" onclick="redirectAccount()">Vedi Prenotazioni</button></p>
        </div>
	</div>

    <?php require "footer.php";?>
    <script src="pagineAusiliarie/redirect.js"></script>
    <script src="script/prenota.js"></script>
</body>
</html>