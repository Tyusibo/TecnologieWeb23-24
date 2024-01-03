<!DOCTYPE html>
<?php
session_start();
$_SESSION['redirect']=null;   //tutte le pagine devono rendere redirect=null
if ($_SERVER["REQUEST_METHOD"] === 'GET') {  /*tramite form con metodo get capisco se reindirizzare al login o
    alla registrazione e imposto redirect per tornare a prenota dopo il login/la registrazione*/
    if (isset($_GET['accedi'])) {
           $_SESSION['redirect']="prenota.php"; 
            header("Location: account.php");
    } 
    if (isset($_GET['registrati'])) {
        $_SESSION['redirect']="prenota.php"; 
         header("Location: registrati.php");
 }    
}

?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Prenota</title>
    <link rel="stylesheet" type="text/css" href="css/prenota.css">
</head>

<body>
    <?php require "header.html"; ?>
    <div style="height: 100px"></div>  <!--lo stile per mostrare il contenuto dopo l'header-->
    <?php
    if(empty($_SESSION['username'])){  //se non loggato
        ?>
        <p>Pagina riservata agli utenti autenticati. <br/> 
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="GET">
			    <label>Effettua l'<input type="submit" id="accedi" name="accedi" value="accesso"></form>oppure</label>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="GET">
                <label><input type="submit" id="registrati" name="registrati" value="registrati">per continuare</p></label>
            </form>
        <?php } else {?>    
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype=“multipart/form-data”>
            <label for="data">Seleziona una data:</label>
            <input type="date" id="data" value="<?php echo $data ?>" name="data" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+1 week')); ?>" required>

            <br>

            <label for="orario">Seleziona un orario:</label>
            <select id="orario" name="orario" required>
                <?php
                    $orario_inizio = strtotime('09:00');
                    $orario_fine = strtotime('18:00');
                    $intervallo = 30 * 60; // 30 minuti in secondi

                    for ($ora = $orario_inizio; $ora <= $orario_fine; $ora += $intervallo) {
                        $ora_selezionata = date('H:i', $ora);
                        
                        // Verifica se la data selezionata non è domenica o lunedì
                        if (date('N', strtotime($_POST['data'])) >= 3) {
                            // Aggiungi solo gli orari validi
                            echo '<option value="' . $ora_selezionata . '">' . $ora_selezionata . '</option>';
                        }
                    }
                ?>
            </select>

            <br>
            <label>Se hai qualche particolare preferenza, lasciaci un messaggio:
            <input type="text" id="message" name="message" value="Massimo 100 parole..."></label>
            <label>Puoi anche inviarci un'immagine del taglio che desideri fare:
            <input type="file" id="file" name="file" value="File"></label>
            <input type="submit" value="Invia">
        </form>
            
        <?php } //parentesi dell'else ?>  
    
    <?php require "footer.html"; ?>
</body>
</html>