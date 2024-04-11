const aantalMuren = 10;
const aantalKisten = 3;
const aantalKolommen = 15;
const totaalGrid = aantalKolommen * aantalKolommen;
let schattenjager = 0;
let vijand = 0;
let vijandMove = 0;
let gold = 0;
const goud = document.getElementById("gold");
let rest = 0;
var div = null;
const muren = [];
const kisten = [];
    

maakGrid(totaalGrid);
maakMuren(aantalMuren);
maakKisten(aantalKisten);
maakSchattenjager();
maakVijand();

goud.innerHTML = gold;

document.onkeydown = function(event) {
    switch (event.keyCode) {
       case 37:
        schattenjager = moveLinks(schattenjager, "schattenjager");
       break;
       case 38:
        schattenjager = moveUp(schattenjager, "schattenjager");
       break;
       case 39:
        schattenjager = moveRechts(schattenjager, "schattenjager");
       break;
       case 40:
        schattenjager = moveDown(schattenjager, "schattenjager");
       break;
    }
    collectGoud();

    vijandMove = Math.floor(Math.random() * 4);
    switch (vijandMove){
        case 1:
          vijand = moveLinks(vijand, "vijand");
         break;
        case 2:
          vijand = moveUp(vijand, "vijand");
         break;
        case 3:
          vijand = moveRechts(vijand, "vijand");
         break;
        case 0:
          vijand = moveDown(vijand, "vijand");
         break;
    }

    if(document.getElementById(vijand).classList.contains("schattenjager")){
      setTimeout(dood, 300);
    }
}

function dood(){
    alert("je bent verloren!");
    location.reload();
}

function maakGrid(totaal){
    for(let k = 1; k<totaal +1; k++){
        div = document.createElement("div");
        div.classList.add("grid-item");
        div.setAttribute("id", k);
        document.getElementById("container").appendChild(div);
    }
}


function maakMuren(aantal){
    for (let i = 0; i < aantal; i++) {
        let muur = Math.floor(Math.random() * 225) + 1;
        muren.push(muur);
      }
    
      muren.forEach(printMuren);
  
}
  
function maakKisten(aantal){
    for (let i = 0; i < aantal; i++) {
        let kist = Math.floor(Math.random() * 225) + 1;
        while(muren.includes(kist)){
            kist = Math.floor(Math.random() * 225) + 1;
        }
        kisten.push(kist);
      }
    
      kisten.forEach(printKisten);

}

function maakSchattenjager(){
    schattenjager = Math.floor(Math.random() * 225) + 1;
    while(muren.includes(schattenjager) || kisten.includes(schattenjager)){
        schattenjager = Math.floor(Math.random() * 225) + 1;
    }
    document.getElementById(schattenjager).classList.add("schattenjager");
}

function maakVijand(){
    vijand = Math.floor(Math.random() * 225) + 1;
    while(muren.includes(vijand) || kisten.includes(vijand) || vijand == schattenjager){
        vijand = Math.floor(Math.random() * 225) + 1;
    }
    document.getElementById(vijand).classList.add("vijand");
}
    
function start() {
    location.reload();
 }

function printMuren(item, index) {
    document.getElementById(item).classList.add('muur');
}

function printKisten(item, index) {
    document.getElementById(item).classList.add('kist');
}


function moveLinks(piece, string){
    if(piece % aantalKolommen != 1){
        if(!document.getElementById(piece - 1).classList.contains("muur")){
          document.getElementById(piece).classList.remove(string);
          piece -= 1;
          document.getElementById(piece).classList.add(string);
        }
    }   
    return piece;
}

function moveUp(piece, string){
    if(!piece < aantalKolommen){
        if(!document.getElementById(piece - aantalKolommen).classList.contains("muur")){
          document.getElementById(piece).classList.remove(string);
          piece -= aantalKolommen;
          document.getElementById(piece).classList.add(string);
        } 
    }
    return piece;
}

function moveRechts(piece, string){
    if(piece % aantalKolommen != 0){
        if(!document.getElementById(piece + 1).classList.contains("muur")){
          document.getElementById(piece).classList.remove(string);
          piece += 1;
          document.getElementById(piece).classList.add(string);
        
        }
    } 
    return piece;
}

function moveDown(piece, string){
    if(piece <= totaalGrid - aantalKolommen){
        if(!document.getElementById(piece + aantalKolommen).classList.contains("muur")){
          document.getElementById(piece).classList.remove(string);
          piece += aantalKolommen;
          document.getElementById(piece).classList.add(string);
        }
    }   
    return piece; 
}

function collectGoud(){
    if(document.getElementById(schattenjager).classList.contains("kist")){
        gold += 1;
        document.getElementById(schattenjager).classList.remove("kist");
        goud.innerHTML = gold;
        setTimeout(end,300);
       
      }
}

function end(){
    if(gold === 3){
        alert("je bent gewonnen!");
        location.reload();
      }
}


