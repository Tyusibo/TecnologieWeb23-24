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
        z-index: 0;
        
    }
    #welcome{
        color: white;
        font-size: 64px;
        z-index: 2;
    
    }
    .overlay{
        top: 154px;
        width: 100%;
        height: 100vh;
        position: absolute;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.4); /* Black see-through */
        z-index: 1;
    }
    .btn{
        z-index: 2;
        align-items: center;
        background-clip: padding-box;
        background-color: #fa6400;
        border: 1px solid transparent;
        border-radius: .25rem;
        box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        display: inline-flex;
        font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 16px;
        font-weight: 600;
        justify-content: center;
        line-height: 1.25;
        margin: 0;
        min-height: 3rem;
        padding: calc(.875rem - 1px) calc(1.5rem - 1px);
        position: relative;
        text-decoration: none;
        transition: all 250ms;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: baseline;
        width: auto;
    }
    .chiSiamo{
        background-image: url(img/chiasiamobckg.jpg);
        background-size: cover;
        color: white;
        height: 100vh;
    }
    .chiSiamo h1{
        text-align: center;
        margin: 0;
    }
    .chiSiamo .row{
        display: flex;
        justify-content: space-between;
        align-items:  center;
    }
    .servizi {
        background-color: orange;
        display: grid;
        grid-template-columns: 1fr 2fr; /* Due colonne di larghezza uguale */
        gap: 20px; /* Spazio tra i servizi */
        justify-content: center; /* Allinea la griglia al centro della section */
    }

    .servizi > div {
        margin-left: 100px;
        border: none; /* Stile di esempio per i bordi */
        padding: 10px; /* Spaziatura interna di esempio */
        max-width: 500px;
        font-size: 20px;
    }

    /* Imposta le posizioni dei singoli servizi nella griglia */
    .cut {
    grid-column: 1; /* Prima colonna */
    grid-row: 1; /* Prima riga */
    }

    .beradcut {
    grid-column: 2; /* Seconda colonna */
    grid-row: 1; /* Prima riga */
    }

    .buzzcut {
    grid-column: 1; /* Prima colonna */
    grid-row: 2; /* Seconda riga */
    }

    .shave {
    grid-column: 2; /* Seconda colonna */
    grid-row: 2; /* Seconda riga */
    }

    /* Aggiungi altre regole per gli altri servizi se necessario */

    

</style>

<body>
<iframe style="margin-bottom:-5px;" src="header.html" width="100%" height="154px" frameborder="0"></iframe>

    <section class="home" id="home" >
        <div class="div_home">
            <div class="overlay"></div>
            <h1 id="welcome">Benvenuto da Gentlemn's Cut</h1>
            <a href="#" class="btn">
                <span>Prenota Subito</span>
            </a>
        </div>
    </section>

    <section class="chiSiamo" id="chiSiamo">
        <h1>About us</h1>
        <div class="row">
            <div class="mapImg">
                <img src="img/map.png" alt="mapImg">
            </div>

            <div class="content">
                <h3>Cosa ci rende speciali?</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                   Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                   in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div>
    </section>

    <section class="servizi" id="servizi">
        <div class="cut" id="cut">
            <h2>Taglio $40</h2>
            <p>Solo stili tradizionali a taglio corto che includono: dissolvenze e rastremazioni che iniziano da 1 o più con un leggero 
                lavoro a forbice sulla parte superiore; pettinati; tagli all'equipaggio; pompadour. Rasatura della nuca con schiuma calda 
                inclusa e abbinata al prodotto su richiesta. Non include lo shampoo.</p>
        </div>
        <div class="beradcut" id="beardcut">
            <h2>Taglio Barba $40</h2>
                <p>Barba tagliata e modellata; linea di schiuma calda e rasoio a mano libera, rasatura del collo e della nuca. Include un trattamento 
                    rilassante con asciugamano caldo e l'applicazione del prodotto.</p>
        </div>
        <div class="buzzcut">
            <h2>Buzz Cut $25</h2>
            <p>Same clipper length all the way around. No blending or scissor work. Hot lather nape shave included. Does not include shampoo.</p>
        </div>
        <div class="shave" id="shave">
            <h2>Shave $40</h2>
            <p>Full face or scalp straight razor shave with hot lather. Includes a relaxing hot towel treatment and product application.</p>
        </div>
        <div class="trasformation" id="trasformation">
            <h2>Trasformation $80</h2>
            <p>Shoulder length or longer chopped off for a whole new look. Styled with product upon request. Shampoo included upon request.</p>
        </div>
    </section>


    <iframe src="footer.html" width="100%" height="200px" frameborder="0" id="foot"></iframe>
</body>
</html>