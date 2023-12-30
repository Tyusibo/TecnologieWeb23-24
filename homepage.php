<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentlemen's Cut Homepage</title>
    <link rel="stylesheet" type="text/css" href="css/homepage.css">

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhb5BVVHcIArfuJCj79LeG87fZyoPPnfQ&callback=initMap">
    </script>
    <script>
        function initMap() {
        // The location of Uluru
        var uluru = {lat: 40.77248001098633, lng: 14.789327621459961};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 10, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
        }

        initMap();
    </script>
    

</head>

<body>
<script src="script/caricaHeader.js"></script>
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
        <h1>Chi Siamo</h1>
        <div class="row">
            <div class="mapImg">
                <div id="map"></div>
            </div>

            <div class="content">
                <h3>Cosa ci rende speciali?</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                   Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                   in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                   <a href="#" class="btn"><span>Contattaci</span></a>
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


    <div id="foot">
    <iframe src="footer.html" width="100%" height="200px" frameborder="0"></iframe>
    </div> 
</body>
</html>