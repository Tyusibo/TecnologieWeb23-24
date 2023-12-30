<!DOCTYPE html>
<?php
session_start();
?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Prenota</title>
    <link rel="stylesheet" type="text/css" href="css/prenota.css">
</head>
<body>
    <script src="script/caricaHeader.js"></script>
    <?php
    if(empty($_SESSION['username'])){
    ?>
    <p>Pagina riservata agli utenti registrati. <br/> Effettua <a
    href="account.php">qui </a> il Login oppure la registrazione per continuare</p>
    <?php } else {?>
        <form action="/process-form" method="post">
        <label for="data">Seleziona una data:</label>
        <input type="date" id="data" name="data" required>

        <br>

        <label for="ora">Seleziona un'ora:</label>
        <select id="ora" name="ora" required>
            <!-- Genera le opzioni per le ore -->
            <?php
            for ($hour = 0; $hour < 24; $hour++) {
                printf('<option value="%02d">%02d</option>', $hour, $hour);
            }
            ?>
        </select>

        <!-- Aggiungi i due punti tra l'ora e i minuti -->
        <span>:</span>

        <label for="minuti">Seleziona i minuti:</label>
        <select id="minuti" name="minuti" required>
            <!-- Genera le opzioni per i minuti (ogni 30 minuti) -->
            <?php
            for ($minute = 0; $minute < 60; $minute += 30) {
                printf('<option value="%02d">%02d</option>', $minute, $minute);
            }
            ?>
        </select>

        <br>

        <input type="submit" value="Invia">
</form>
            
        <?php   }
    ?>
    
    <script src="script/caricaFooter.js"></script> 
</body>
</html>