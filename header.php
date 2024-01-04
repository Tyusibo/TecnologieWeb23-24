<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>

<link rel="stylesheet" type="text/css" href="css/header.css">
<script src="https://kit.fontawesome.com/bdeddbfb58.js" crossorigin="anonymous"></script>

<header class="headertransition sticky" id="myHeader">
        <div class="header">
            <div class="colonna1">
                <a href="homepage.php" target="_top" class="logo">
                    <img src="img/logo.png" alt="Gentlemen's Cut" width="200" height="100">
                </a>
            </div>

            <div class="colonna2">
                <nav>
                    <ul id="navlist">
                        <li id="home_h"><a href="homepage.php" target="_top">Homepage</a></li>
                        <li id="chisiamo_h"><a href="<?php if($currentPage=== 'homepage.php')
                                                echo '#chiSiamo';
                                            else
                                                echo 'homepage.php#chiSiamo'            
                                    ?>" 
                        target="_top">Chi Siamo</a></li>
                        <li id="servizi_h"><a href="<?php if($currentPage=== 'homepage.php')
                                                echo '#servizi';
                                            else
                                                echo 'homepage.php#servizi'            
                                    ?>" 
                         target="_top">Servizi</a></li>
                        <li id="contattaci_h"><a href="#footerplaceholder" target="_top">Contattaci</a></li>
                        <li id="galleria_h"><a href="galleria.php" target="_top">Galleria</a></li>
                        <li id="prenota-H"><a href="prenota.php" target="_top" class="bottone">Prenota</a></li>
                    </ul>
                </nav>  
            </div>
            <div class="colonna3">
                
                <a href="account.php" target="_top" class="account"><i class="fa-sharp fa-solid fa-user" style="font-size: 24px; margin-left: -30px; margin-top: -7px;"></i></a>
                <!--30 px a sinistra perchè la foto è ritagliata male-->
            </div>
        </div>
         <!--Se si potrà mettere qualcosa che non da fastidio al contenuto delle pagine che caricano l'header -->
</header>
<script src="script/stickyHeader.js"></script>  <!--Se messo prima non funzionerà perchè non conosce gli id-->



