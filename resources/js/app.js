


import flatpickr from "flatpickr";
import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
import focus from '@alpinejs/focus';
Alpine.plugin(focus);
Alpine.start();
import "@fortawesome/fontawesome-free/css/all.css";
import 'simplebar/dist/simplebar.min.css';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

// import "flowbite/dist/flowbite";
const locale = document.querySelector('meta[name="locale"]').getAttribute('content');



class LaravelUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file.then(file => new Promise((resolve, reject) => {
            let formData = new FormData();
            formData.append('upload', file);

            axios.post(imageUploadRoute ,formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                resolve({
                    default: response.data.url
                });
            }).catch(error => {
                reject(error.response.data.errors.upload);
            });
        }));
    }
}

function CustomUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new LaravelUploadAdapter(loader);
    };
}




const editor = ClassicEditor.create(document.querySelector('#ckeditor'), {
  // CKEditor configuration options
  language: locale,
  extraPlugins: [ CustomUploadAdapterPlugin ],

}).then((editor) => {
  console.log('Editor was initialized', editor);
}).catch((error) => {
  console.error(error);
});






//Rotate-90 for any icon have search-input and search-icon as class

const searchInputAny=document.querySelectorAll('.search-input');
const searchIconsAny=document.querySelectorAll('.search-icon');

searchInputAny.forEach(function(searchInput, index) {
searchInput.addEventListener('focus', function() {
    searchIconsAny[index].classList.add('rotate-icon');
});

searchInput.addEventListener('blur', function() {
    searchIconsAny[index].classList.remove('rotate-icon');
});

});



var listItems = document.querySelectorAll("#aside .listopennavbar");

listItems.forEach(function(listItem) {
  var arrowIcon = listItem.querySelector(".arrowicon");
  var isOpen = false;

  listItem.addEventListener("click", function() {
    isOpen = !isOpen;

    if (isOpen) {
      arrowIcon.classList.add("rotate-180");
    } else {
      arrowIcon.classList.remove("rotate-180");
    }
  });
});






//collapse sidebar for and show only icon
let sidebariconOnly = document.getElementById("sidebaricononlys");

sidebariconOnly.onclick = function myFunction() {
  var icons = document.getElementsByClassName("sidebar-icon");
  for (var i = 0; i < icons.length; i++) {
    var icon = icons[i];
    if (icon.style.display === "none") {
      icon.style.display = "inline-block";
      aside.style.background = "transparent";
      if (typeof mainRight === 'undefined') {
        mainLeft.style.marginLeft = "17vw";
      } else {
        mainRight.style.marginRight = "17vw";
      }
    } else {
      icon.style.display = "none";
      aside.style.background = "white";
      if (typeof mainRight === 'undefined') {
        mainLeft.style.marginLeft = "8vw";
      } else {
        mainRight.style.marginRight = "8vw";
      }
    }
  }
}


    //expand sidebar when click on white sidebar
    aside.onclick = function myFunction() {
        if (window.innerWidth > 1024) {
          var collapsedSidebars = document.getElementsByClassName("sidebar-icon");
          for (var i = 0; i < collapsedSidebars.length; i++) {
            var collapsedSidebar = collapsedSidebars[i];
            collapsedSidebar.style.display = "inline-block";
          }
          aside.style.background = "transparent";
          if (typeof mainRight === 'undefined') {
            mainLeft.style.marginLeft = "17vw";
          } else {
            mainRight.style.marginRight = "17vw";
          }
        }
      }








// Full Screen Api

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



// Spinner

    // window.addEventListener('load', () => {
    //     const spinner = document.querySelector('#spinner');
    //     spinner.classList.remove('hidden');
    //     setTimeout(() => {
    //       spinner.classList.add('hidden');
    //     },.1); // Replace 3000 with the duration of your loading process
    //   });





// CheckAll For Checkbox in tables
    const headerCheckbox = document.getElementById('checkboxAll');
    const bodyCheckboxes = document.querySelectorAll('#multiselect-table tbody input[type="checkbox"]');

    headerCheckbox.addEventListener('click', () => {
        bodyCheckboxes.forEach(checkbox => {
            checkbox.checked = headerCheckbox.checked;
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Your code here


    document.querySelectorAll('#multiselect-table input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
          // Check if any checkboxes are checked
          var isChecked = false;
          document.querySelectorAll('#multiselect-table input[type="checkbox"]').forEach(function(checkbox) {
            if (checkbox.checked) {
              isChecked = true;
            }
          });

          // Disable or enable the deleteAll button
          var deleteAllButton = document.getElementById('deleteAllbtn');
          if (isChecked) {
            deleteAllButton.hidden = false;
          } else {
            deleteAllButton.hidden = true;
          }
        });
      });

    });


    let deleteAllbtn =  document.getElementById('delete-selected-btn');
    let selected_ids = document.getElementById('selected_ids');
    deleteAllbtn.onclick = function()
    {
        let selected = new Array();

        document.querySelectorAll('#multiselect-table input[type="checkbox"]:checked').forEach(function(checkbox) {
            selected.push(checkbox.value);
        });

        if(selected.length > 0)
        {
            selected_ids.value = selected;
        }
    }







