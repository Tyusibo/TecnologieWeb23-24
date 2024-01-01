<!DOCTYPE html>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera il nuovo valore dal campo di input del modulo
    $data = $_POST['data'];
    $orario = $_POST['orario'];
    $message = $_POST['message'];
    $file = $_POST['file'];

} else {
    //li setto null per non generare errori
    $data=null; 
    $orario=null;
    $message=null;
    $file=null;
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
    <?php
    if(empty($_SESSION['username'])){
    ?>
    <p>Pagina riservata agli utenti registrati. <br/> Effettua il <a href="account.php">login</a> oppure 
    <a href="registrati.php">registrati</a> per continuare</p>
    <?php } else {?>    
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype=“multipart/form-data”>
            <label for="data">Seleziona una data:</label>
            <input type="date" id="data" value="<?php echo $data ?>" name="data" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+1 week')); ?>" required>

            <br>

            <label for="orario">Seleziona un orario:</label>
            <select id="orario" name="orario" value="<?php echo $orario ?>" required>
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
            <input type="text" name="message" value="<?php echo $message ?>"></label>
            <label>Puoi anche inviarci un'immagine del taglio che desideri fare:
            <input type="file" name="file" value="<?php echo $file ?>"></label>

            <input type="submit" value="Invia">
        </form>
            
        <?php
        if (!is_null($data)) {
            printf("hello");
            }   
        }
    ?>
    
    <?php require "footer.html"; ?>
</body>
</html>