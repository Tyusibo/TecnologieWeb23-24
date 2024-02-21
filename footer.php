<?php //$currentPage = basename($_SERVER['PHP_SELF']);  è inutile perchè già lo fa header.php?> 

<link rel="stylesheet" type="text/css" href="css/footer.css">
<script src="https://kit.fontawesome.com/bdeddbfb58.js" crossorigin="anonymous"></script> <!--per le icone-->

<footer id="footerplaceholder" class="footer">
        <div class="fprinc">
            <div class="col-1">
                <a href="homepage.php" class="logo">
                    <img src="img/logo_footer.png" alt="logo_bianco" width="200" height="200px">
                </a>
            </div>
            <div class="col-2">
                <h3>ORARI LAVORATIVI</h3>
                <ul>
                    <li><span>Lunedì:</span> Chiuso</li>
                    <li><span>Martedì-Sabato:</span> 9:00 - 19:00 </li>
                    <li><span>Domenica:</span> Chiuso</li>
                </ul>
            </div>
            <div class="col-3">
                <h3>LINK UTILI</h3>
                <ul>
                    <li id="home_f"><a href="<?php if($currentPage=== 'homepage.php')
                                                echo '#home';
                                            else
                                                echo 'homepage.php';?>">Homepage</a></li>
                    <li id="chisiamo_f"><a href="<?php if($currentPage=== 'homepage.php')
                                                echo '#chiSiamo';
                                            else
                                                echo 'homepage.php#chiSiamo';?>">Chi Siamo</a></li>
                    <li id="servizi_f"><a href="<?php if($currentPage=== 'homepage.php')
                                                echo '#servizi';
                                            else
                                                echo 'homepage.php#servizi';?>">Servizi</a></li>
                    <li id="galleria_f"><a href="galleria.php">Galleria</a></li>
                    <li id="prenota_f"><a href="prenota.php">Prenota</a></li>
                    <li id="account_f"><a href="account.php">Account</a></li>
                </ul>
            </div>
            <div class="col-4">
                <h3>CONTATTACI</h3>
                <form action="" method="POST">
                    <input type="text" placeholder="La tua E-mail" id="" class="fform">
                    <textarea id="message" name="message" rows="4" cols="50" placeholder="Il tuo Messaggio" class="fform"></textarea>
                    <input type="submit" value="Contattaci Ora" class="bottone">
                </form>
            </div>
        </div>
        <div class="copy">
            <span>Copyright © 2023 Gentlemen's Cut. All Rights Reserved</span>
            <div>
                <a href="#" class="fa fa-instagram ficon"></a>
                <a href="#" class="fa fa-facebook ficon"></a>
                <a href="#" class="fa fa-twitter ficon"></a>
            </div>
        </div>
</footer>    

<script src="script/scroll.js"></script>  <!--Se messo prima non funzionerà perchè non conosce gli id-->