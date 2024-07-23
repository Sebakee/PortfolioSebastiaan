var beschrijvingDiv = document.getElementById("beschrijving");
var portfolioDiv = document.getElementById("portfolioDiv");
var profielDiv = document.getElementById("profielDiv");
var drawingsDiv = document.getElementById("drawingDiv");
var image = document.getElementById("ProfielFoto");
var icons = document.getElementById("icons");


function beschrijving(){
    portfolioDiv.classList.remove("visible");
    portfolioDiv.classList.add("hidden");
    beschrijvingDiv.classList.remove("hidden");
    beschrijvingDiv.classList.add("visible");
    profielDiv.classList.add("hidden");
    profielDiv.classList.remove("visible");
    drawingsDiv.classList.add("hidden");
    drawingsDiv.classList.remove("visible");
    image.classList.add("move");
    icons.classList.add("move");
}

function portfolio(){
    image.classList.add("move");
    icons.classList.add("move");
    portfolioDiv.classList.remove("hidden");
    portfolioDiv.classList.add("visible");
    beschrijvingDiv.classList.remove("visible");
    beschrijvingDiv.classList.add("hidden");
    profielDiv.classList.add("hidden");
    profielDiv.classList.remove("visible");
    drawingsDiv.classList.add("hidden");
    drawingsDiv.classList.remove("visible");
    
}

function profiel(){
    portfolioDiv.classList.remove("visible");
    portfolioDiv.classList.add("hidden");
    beschrijvingDiv.classList.remove("visible");
    beschrijvingDiv.classList.add("hidden");
    profielDiv.classList.add("visible");
    profielDiv.classList.remove("hidden");
    drawingsDiv.classList.add("hidden");
    drawingsDiv.classList.remove("visible");
    image.classList.add("move");
    icons.classList.add("move");
}

function drawing(){
    portfolioDiv.classList.remove("visible");
    portfolioDiv.classList.add("hidden");
    beschrijvingDiv.classList.remove("visible");
    beschrijvingDiv.classList.add("hidden");
    profielDiv.classList.add("hidden");
    profielDiv.classList.remove("remove");
    drawingsDiv.classList.add("visible");
    drawingsDiv.classList.remove("hidden");
    image.classList.add("move");
    icons.classList.add("move");
}

