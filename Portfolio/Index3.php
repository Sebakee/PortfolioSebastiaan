<!DOCTYPE HTML>

<html>
<head>

<meta charset=utf-8>
<title>Portfolio</title>
<link rel="stylesheet" href="PortfolioCss3.css">
<link rel="stylesheet" href="PortfolioCssMobile2.css">
<script src="PortfolioJs2.js" defer></script>
</head>
    <body>
    <main>
    <h2><link>Sebastiaan Siepman</link></h2>
    
        <div class="character">
            <div class="characterimg"> <img src="Images/characterSS.png" alt="Character Image"></div>
           
        
            <div class="keuzes">
            <ul>
                <li><button onclick="skills()">skills</button></li>
                <li id="project"><button onclick="inventorie()">inventorie</button></li>
                <li><button onclick="beschrijving()">beschrijving</button></li>
                <li><button onclick="traits()">traits</button></li>
            </ul>
            </div>
            <div class="projecten">
      
            <div id="skills" class="hidden project">
            <ul>
                <li> php <div class="sterren"><img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster">
                <img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster"></div> </li>
                <li> Html/css <div class="sterren"><img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster">
                <img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster"></div></li>
                <li>Javascript <div class="sterren"><img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster">
                <img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster"><img src="Images/starNN.png" alt="ster"></div></li>
                <li>tekenen <div class="sterren"><img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster">
                <img src="Images/star.png" alt="ster"><img src="Images/starNN.png" alt="ster"><img src="Images/starNN.png" alt="ster"></div></li>
                <li>sql <div class="sterren"><img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster">
                <img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster"></div></li>
                <li>Git <div class="sterren"><img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster">
                <img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster"><img src="Images/star.png" alt="ster"></div></li>
            </ul>      
            </div>

            <div id="traits" class="hidden project">
            <ul>
               <li><div class="groen">+ creatief</div></li>
               <li><div class="groen">+ sportief</div></li>
               <li><div class="rood">- onhandig</div></li>
            </ul>      
            </div>
            <div id="beschrijving" class="visible project">
                <p>
                    Sebastiaan Siepman is een PHP developer gespecialiseerd in het bouwen (en designen) van websites. Door zijn creativiteit kan hij unieke en scalable websites creëren.
                    Hij is in contact gekomen met het developen toen hij 15 was in het middelbaar en heeft zijn skills verder ontwikkeld door een opleiding te volgen bij de VDAB.
                    Voetballen en tekenen zijn ook passies van hem. Sebastiaan voetbalt bij een <a href="https://www.rbfa.be/nl/club/1126/ploeg/284926/overzicht">reserve ploeg bij OG Vorselaar</a> als centrale middenvelder.
                </p>
            </div>

            <div id="inventorie" class="hidden project">
            <div class="grid-container" id="container">
                <div class="grid-item"><a href="Websites/schattenjacht/schattenjacht.php"><img src="Images/treasure.png" alt="schatkist"><p>schattenj</p></a></div>
                <div class="grid-item"><a href="Websites/TEST/Menu.php"><img src="Images/pizza.png" alt="pizza"><p>pizzeria</p></a></div>
                <div class="grid-item"><a href="Websites/EXTRA/Index.php"><img src="Images/video.png" alt="pizza"><p>videotheek</p></a></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
            </div>
            </div>
            </div>
        </div>
    
    </main>
    <footer>
        <p>	<div class="contactMe">&#9830; contact me &#9830; </div>  <a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSDbFTGmrCWwBmrsXpBXnwPglbcnVprghVRfRpjFTqTSfkXbgSCRZftRcDqDJTZBNvmQVSGb">sebastiaan.siepman@gmail.com</a>&#9830; <a href="https://www.linkedin.com/in/sebastiaan-siepman-508917245/">linkedin</a> </p>
    </footer>
    </body>
</html>