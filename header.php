<?php 
require "database/nome.php";
$currentPage = basename($_SERVER['PHP_SELF']); //identifica la pagina corrente per poter realizzare l'effetto scroll 
//quando possibile (su homepage) ?> 

<!-- condivisi da tutte le pagine -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/header.css">
<script src="https://kit.fontawesome.com/bdeddbfb58.js" crossorigin="anonymous"></script> <!--per le icone-->
<script src="script/header.js"></script>  

<header class="headertransition headerfixed" id="header">
        <div class="headerflex">
            <div class="colonna1">
                <a href="homepage.php" class="logo">
                    <img src="img/logo.png" alt="Gentlemen's Cut" width="200" height="100">
                </a>
            </div>
            <div class="colonna2">
                <nav>
                    <ul id="navlist">
                        <li id="home_h"><a href="<?php if($currentPage=== 'homepage.php')
                                                echo '#home';
                                            else
                                                echo 'homepage.php';?>">Homepage</a></li>
                        <li id="chisiamo_h"><a href="<?php if($currentPage=== 'homepage.php')
                                                echo '#chiSiamo';
                                            else
                                                echo 'homepage.php#chiSiamo';?>">Chi Siamo</a></li>
                        <li id="servizi_h"><a href="<?php if($currentPage=== 'homepage.php')
                                                echo '#servizi';
                                            else
                                                echo 'homepage.php#servizi';?>">Servizi</a></li>
                        <li id="contattaci_h"><a href="#footerplaceholder">Contattaci</a></li>
                        <li id="galleria_h"><a href="galleria.php">Galleria</a></li>
                        <li id="prenota_h"><a href="prenota.php" class="bottone">Prenota</a></li>
                    </ul>
                </nav>  
            </div>
            <div onmouseout="hideRectangle()" class="colonna3"> 
                <div class="account popup" onmouseover="showRectangle()"><a href="account.php"><i class="fa-sharp fa-solid fa-user" style="font-size: 24px; margin-left: -30px; margin-top: -7px;"></i></a>
                    <span class="popuptext" id="myPopup"> 
                        <?php   if(isset($_SESSION['username']) ){
                                    echo "Benvenuto, " . getNome($_SESSION["username"]);
                                    echo "<p>Premi <a href=account.php class=linkbutton>qui</a> per gestire il tuo account</p>";
                                    echo "<p id=esci>Premi <button class=linkbutton id=esci>qui</button> per uscire</p>";
                                }
                                else{
                                    echo "Non ti sei ancora autenticato";
                                    echo "<p>Premi <a href=autenticazione.php class=linkbutton>qui</a> per effettuare l'autenticazione</p>";
                                }

                        
                        ?>
                    </span>
                </div>
            </div>
        </div>
</header>
<script src="script/colorTransition.js"></script>  <!--Se messi prima non funzioneranno perchè non conosceranno gli id-->
<script src="script/scroll.js"></script>  





