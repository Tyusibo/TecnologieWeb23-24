<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Homepage</title>
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
</head>

<style> 
    body{
        margin: 0px;
    }
    .div_home{
        background-image: url(img/homebackg.jpg);
        height: 100vh;
        background-size: cover;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        
    }
    #welcome{
        color: white;
        font-size: 64px;
        z-index: 100;
    }
    .overlay{
        width: 100%;
        height: 100vh;
        position: absolute;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.4); /* Black see-through */
    }

</style>

<body>
    

    <section class="home" id="home" >
        <div class="div_home">
            <div class="overlay"></div> 
            <h1 id="welcome">Benvenuto da Gentlemn's Cut</h1>
            
        </div>
    </section>


    <iframe src="footer.html" width="100%" height="200px" frameborder="0"></iframe>
</body>
</html>