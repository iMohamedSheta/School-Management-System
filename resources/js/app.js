import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;
import "@fortawesome/fontawesome-free/css/all.css";

Alpine.plugin(focus);

Alpine.start();
import "flowbite/dist/flowbite";




var arrowicon = document.getElementById("arrowicon");
var listopennavbar =document.getElementById("listopennavbar");

let rotateVariable='';

listopennavbar.onclick=function myFunction() {

    if(rotateVariable == ''){
        rotateVariable ="rotate-180";
    }
    else{
        rotateVariable = '';
    }
    arrowicon.setAttribute('class',rotateVariable +" fa-solid fa-chevron-down px-3 shrink-0 transition-transform duration-200");

}


let displaytype = 'inline-block';

let sidebariconOnly =document.getElementById("sidebaricononlys");

sidebariconOnly.onclick =

    function myFunction() {
        if (sidebariconOnly1.style.display === "none") {
          sidebariconOnly1.style.display="inline-block";
          sidebariconOnly2.style.display="inline-block";
          sidebariconOnly3.style.display="inline-block";
          sidebariconOnly4.style.display="inline-flex";
          sidebariconOnly5.style.display="inline-block";
          sidebariconOnly6.style.display="inline-block";
          aside.style.background="transparent";
          main.style.marginRight = "20vw";

        } else {
          sidebariconOnly1.style.display="none";
          sidebariconOnly2.style.display="none";
          sidebariconOnly3.style.display="none";
          sidebariconOnly4.style.display="none";
          sidebariconOnly5.style.display="none";
          sidebariconOnly6.style.display="none";
          aside.style.background = "white";
          main.style.marginRight = "10vw";
        }
      }


