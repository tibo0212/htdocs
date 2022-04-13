let maxBar = 200;
let currentBar = 0;
let progressBar;
let intervalId;

let initialisation = function() {
    progressBar = document.getElementById( "progressBar" );
    progressBar.value = currentBar;
    progressBar.max = maxBar;
  } 
let displayBar = function() {
currentBar++;
if (currentBar > maxBar) {
    clearInterval( intervalId );
}
progressBar.value = currentBar;
}
// displayBar est appelée toutes les 100 millisecondes
intervalId = setInterval( displayBar , 45 ); 

window.onload = function() {
    initialisation();
    intervalId = setInterval( displayBar , 45 );
  }