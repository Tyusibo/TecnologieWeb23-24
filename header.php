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
                    <ul>
                        <li><a href="homepage.php" target="_top">Homepage</a></li>
                        <li><a href="<?php if($currentPage=== 'homepage.php')
                                                echo '#chiSiamo';
                                            else
                                                echo 'homepage.php#chiSiamo'            
                                    ?>" 
                        target="_top">Chi Siamo</a></li>
                        <li><a href="<?php if($currentPage=== 'homepage.php')
                                                echo '#servizi';
                                            else
                                                echo 'homepage.php#servizi'            
                                    ?>" 
                         target="_top">Servizi</a></li>
                        <li><a href="#footerplaceholder" target="_top">Contattaci</a></li>
                        <li><a href="galleria.php" target="_top">Galleria</a></li>
                        <li><a href="prenota.php" target="_top" class="bottone">Prenota</a></li>
                    </ul>
                </nav>  
            </div>
        </div>
         <!--Se si potrà mettere qualcosa che non da fastidio al contenuto delle pagine che caricano l'header -->
</header>
<script src="script/stickyHeader.js"></script>  <!--Se messo prima non funzionerà perchè non conosce gli id-->



