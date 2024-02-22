<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["currentPageName"])) {
        // Recupera il valore di 'currentPageName'
        $_SESSION['redirect'] = $_POST["currentPageName"];
    }
    if (isset($_POST["mod"]) && $_POST["mod"] === "true") {
        $_SESSION['change'] = true;
    } 
}
?>