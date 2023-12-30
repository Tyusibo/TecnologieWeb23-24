<?php
session_start();
// Invalida la sessione
session_destroy();

// Puoi anche eliminare specifiche variabili di sessione se necessario
unset($_SESSION['username']);

// Reindirizza alla pagina di accesso o a una pagina di conferma del logout
header("Location: ../account.php");
exit();
?>