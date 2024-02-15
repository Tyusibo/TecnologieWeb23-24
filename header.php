<?php $currentPage = basename($_SERVER['PHP_SELF']); //identifica la pagina corrente per poter realizzare l'effetto scroll 
//quando possibile (su homepage) ?> 

<link rel="stylesheet" type="text/css" href="css/header.css">
<script src="https://kit.fontawesome.com/bdeddbfb58.js" crossorigin="anonymous"></script> <!--per le icone-->
<script src="script/header.js"></script>  

<header class="headertransition sticky" id="myHeader">
        <div class="header">
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
            <div class="colonna3"> 
                <div class="account popup" onmouseover="showRectangle()"><a href="account.php"><i class="fa-sharp fa-solid fa-user" style="font-size: 24px; margin-left: -30px; margin-top: -7px;"></i></a>
                    <span class="popuptext" id="myPopup"> 
                        <?php   if(isset($_SESSION['username']) )
                                    echo "Benvenuto, " . $_SESSION['username'];
                                else
                                    echo "Non sei ancora Loggato";
                        ?>
                    </span>
                </div>
                <!--30 px a sinistra perchè la foto è ritagliata male-->
            </div>
        </div>
</header>
<script src="script/stickyHeader.js"></script>  <!--Se messi prima non funzioneranno perchè non conosceranno gli id-->
<script src="script/scroll.js"></script>  




