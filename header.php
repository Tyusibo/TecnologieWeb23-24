<?php 
require "database/nome.php";
$currentPage = basename($_SERVER['PHP_SELF']); //identifica la pagina corrente per poter realizzare l'effetto scroll 
//quando possibile (su homepage) ?> 

<!-- condivisi da tutte le pagine -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/header.css">
<script src="https://kit.fontawesome.com/bdeddbfb58.js" crossorigin="anonymous"></script> <!--per le icone-->
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
                <div class="account popup" onmouseover="showRectangle()"><a href="account.php"><i class="fa-sharp fa-solid fa-user" style="font-size: 24px;"></i></a>
                    <span class="popuptext" id="myPopup"> 
                        <?php   if(isset($_SESSION['username']) ){
                                    echo "<p>Benvenuto,&nbsp;&nbsp;" . getNome($_SESSION["username"])."</p>";
                                    echo "<p><a href=account.php class=linkbutton>Account</a></p>";
                                }
                                else{
                                    echo "<p>Non ti sei ancora autenticato</p>";
                                    echo "<p><a href=autenticazione.php class=linkbutton>Login in/Sign in</a></p>";
                                }
                                echo "<p><button class=linkbutton id=esci>Esci</button></p>";
                        ?>
                    </span>
                </div>
            </div>
        </div>
</header>
<script src="script/colorTransition.js"></script>  <!--Se messi prima non funzioneranno perchè non conosceranno gli id-->
<script src="script/scroll.js"></script>  
<script src="script/header.js"></script>  
<?php   if(isset($_SESSION['username']) ){
                                    ?><script>mostraEsci()</script><?php
                                }






