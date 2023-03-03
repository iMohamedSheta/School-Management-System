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



let sidebariconOnly =document.getElementById("sidebaricononlys");


    sidebariconOnly.onclick = function myFunction() {
        var i = 1;
        var sidebarIcon;
        while ((sidebarIcon = document.getElementById('sidebariconOnly' + i)) !== null) {
        if (sidebarIcon.style.display === "none") {
            sidebarIcon.style.display = "inline-block";
            aside.style.background = "transparent";
            if (typeof mainRight === 'undefined') {
            mainLeft.style.marginLeft = "20vw";
            } else {
            mainRight.style.marginRight = "20vw";
            }
        } else {
            sidebarIcon.style.display = "none";
            aside.style.background = "white";
            if (typeof mainRight === 'undefined') {
            mainLeft.style.marginLeft = "10vw";
            } else {
            mainRight.style.marginRight = "10vw";
            }
        }
        i++;
        }
    }



    aside.onclick = function myFunction() {
        if (window.innerWidth > 1024) {
        var i = 1;
        while (true) {
            var sidebariconOnlyId = "sidebariconOnly" + i;
            var sidebariconOnlyElement = document.getElementById(sidebariconOnlyId);
            if (!sidebariconOnlyElement) {
            break;
            }
            sidebariconOnlyElement.style.display = "inline-block";
            i++;
        }
        aside.style.background = "transparent";
        if (typeof mainRight === 'undefined') {
            mainLeft.style.marginLeft = "20vw";
        } else {
            mainRight.style.marginRight = "20vw";
        }
        }
    }











    let myDocument = document.documentElement;
    let fullscreenbtn = document.getElementById("fullscreenbtn");
    let fullscreenicon = document.getElementById("fullscreenicon");

    fullscreenbtn.onclick = function(){
        if(fullscreenbtn.ariaLabel == "Open"){
            if (myDocument.requestFullscreen) {
                myDocument.requestFullscreen();
            }
            else if (myDocument.msRequestFullscreen) {
                myDocument.msRequestFullscreen();
            }
            else if (myDocument.mozRequestFullScreen) {
                myDocument.mozRequestFullScreen();
            }
            else if(myDocument.webkitRequestFullscreen) {
                myDocument.webkitRequestFullscreen();
            }
            fullscreenbtn.ariaLabel = "Close";
            fullscreenicon.setAttribute("class",'fa-solid fa-square-xmark text-lg');

            // Save fullscreen state to localStorage
            localStorage.setItem("fullscreen", "true");
        }
        else{
            if(document.exitFullscreen) {
                document.exitFullscreen();
            }
            else if(document.msexitFullscreen) {
                document.msexitFullscreen();
            }
            else if(document.mozexitFullscreen) {
                document.mozexitFullscreen();
            }
            else if(document.webkitexitFullscreen) {
                document.webkitexitFullscreen();
            }

            fullscreenbtn.ariaLabel = "Open";
            fullscreenicon.setAttribute("class",'fas fa-expand');

            // Remove fullscreen state from localStorage
            localStorage.removeItem("fullscreen");
        }
    };

    // Check for fullscreen state when the page is loaded
    window.onload = function() {
        let fullscreen = localStorage.getItem("fullscreen");
        if (fullscreen == "true") {
            myDocument.requestFullscreen();
            fullscreenbtn.ariaLabel = "Close";
            fullscreenicon.setAttribute("class",'fa-solid fa-square-xmark text-lg');
        }
    };

