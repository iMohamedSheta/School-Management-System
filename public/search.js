


//Searching
export function setupSearchUsers(searchInput, userIdInput) {
    if (!searchInput || !userIdInput) {
      return; // exit early if inputs don't exist
    }

    // your code here

    let timeoutId;

    // Attach an event listener to the input element
    searchInput.addEventListener('input', function () {
      // Get the search query
      let query = this.value;

      // Cancel any previously scheduled AJAX requests
      clearTimeout(timeoutId);

      // Schedule a new AJAX request after 500ms
      timeoutId = setTimeout(function() {
        axios
          .get('/user/search', {
            params: {
              q: query,
            },
          })
          .then((response) => {
            // Get the search results
            let results = response.data;

            // Show the search results in the results div
            let resultsDiv = document.getElementById('search-results');
            resultsDiv.innerHTML = '';

            // Create a list of suggestions
            let suggestionsList = document.createElement('ul');
            suggestionsList.classList.add(
              'bg-white',
              'border',
              'border-gray-300',
              'rounded-lg',
              'mt-2',
              'w-full'
            );
            for (let i = 0; i < results.length; i++) {
              let result = results[i];
              let suggestionItem = document.createElement('li');
              suggestionItem.textContent = result.name;
              suggestionItem.classList.add(
                'px-4',
                'py-2',
                'cursor-pointer',
                'hover:bg-gray-100'
              );

              // Add a click event listener to update the search input's value and the hidden input's value when a suggestion is clicked
              suggestionItem.addEventListener('click', function () {
                searchInput.value = result.name;
                userIdInput.value = result.id;
                resultsDiv.innerHTML = '';
              });

              suggestionsList.appendChild(suggestionItem);
            }

            resultsDiv.appendChild(suggestionsList);
              // Add a click event listener to the document object to hide the suggestion box when the user clicks outside of it
      document.addEventListener('click', function (event) {
        if (!suggestionsList.contains(event.target)) {
          resultsDiv.innerHTML = '';
        }
      });
          })
          .catch((error) => {
            console.error(error);
          });
      }, 500);
    });

}





export function setupSearchClassrooms(searchInput) {
    if (!searchInput) {
      return; // exit early if inputs don't exist
    }

    let timeoutId;

    // Attach an event listener to the input element
    searchInput.addEventListener('input', function () {
      // Get the search query
      let query = this.value;

      // Cancel any previously scheduled AJAX requests
      clearTimeout(timeoutId);

      // Schedule a new AJAX request after 500ms
      timeoutId = setTimeout(function () {
        axios
          .get('/classrooms/search', {
            params: {
              q: query,
            },
          })
          .then((response) => {
            // Get the search results
            let results = response.data;

            // Find the table body element
            let tableBody = document.querySelector('#classrooms-table tbody');

            // Clear the table
            tableBody.innerHTML = '';

            for (let i = 0; i < results.length; i++) {
                let result = results[i];

                // Create a new table row
                let newRow = document.createElement('tr');
                newRow.classList.add();



                // Set the row id to the classroom id
                newRow.setAttribute('id', `classroom-row-${result.id}`);

                // Create table cells for each field in the result object
                let idCell = document.createElement('td');
                idCell.textContent = result.id;
                idCell.classList.add( "px-6" ,"py-4", "whitespace-nowrap", "text-center", "overflow-auto");
                newRow.appendChild(idCell);

                let nameCell = document.createElement('td');
                nameCell.textContent = result.name;
                nameCell.classList.add( "px-6", "py-4", "whitespace-nowrap", "text-center", "overflow-auto");
                newRow.appendChild(nameCell);

                let descriptionCell = document.createElement('td');
                descriptionCell.textContent = result.description || '-';
                descriptionCell.classList.add( "px-6", "py-4", "whitespace-nowrap", "text-center", "overflow-auto");
                newRow.appendChild(descriptionCell);

                let gradeCell = document.createElement('td');
                gradeCell.textContent = result.grade ? result.grade.name : '-';
                gradeCell.classList.add( "px-6", "py-4", "whitespace-nowrap", "text-center", "overflow-auto");
                newRow.appendChild(gradeCell);

                let actionsCell = document.createElement('td');
                actionsCell.classList.add( "px-6", "py-4", "whitespace-nowrap", "text-center" ,"overflow-auto");

 // Add the Edit button to the actions cell
let editButton = document.createElement('button');
editButton.classList.add('btn', 'btn-dark', 'btn-sm', 'mx-2');
editButton.textContent = "{{trans('main.edit')}}";
editButton.setAttribute('data-modal-target', `grade-modal${result.id}`);
editButton.setAttribute('data-modal-toggle', `grade-modal${result.id}`);
editButton.addEventListener('click', function () {
    // Toggle the modal when the button is clicked
    let modal = document.getElementById(`grade-modal${result.id}`);
    modal.classList.toggle('hidden');
    modal.setAttribute('aria-hidden', modal.classList.contains('hidden'));
    modal.setAttribute('tabindex', modal.classList.contains('hidden') ? -1 : 0);
    showModal(modalContainer.id);

});

actionsCell.appendChild(editButton);

// Create the container element for the modal
let modalContainer = document.createElement('div');
modalContainer.id = `grade-modal${result.id}`;
modalContainer.classList.add('modal');

// Add the modal content, including a form
modalContainer.innerHTML = `
<div id="grade-modal{{$classroom->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden max-md:w-screen max-md:h-screen p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
<div class="relative w-full h-full max-w-md md:h-auto">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Close button -->
    <button type="button" class="absolute top-3 {{LaravelLocalization::getCurrentLocale() == 'ar' ? "left-2.5" : "right-2.5" }}
    text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto
    inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="grade-modal{{$classroom->id}}">
    <i class="fa-solid fa-square-xmark text-2xl"></i>
    <span class="sr-only">Close modal</span>
    </button>
    <!-- Modal header and form -->
    <div class="px-6 py-6 lg:px-8">
    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ trans('main.edit-classroom') }}</h3>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="classroom-name">Classroom Name</label>
            <input type="text" class="form-control" id="classroom-name">
          </div>
          <div class="form-group">
            <label for="classroom-description">Classroom Description</label>
            <textarea class="form-control" id="classroom-description"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-modal-hide="${modalContainer.id}">Cancel</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
`;

// Add event listeners to the modal buttons
let closeButton = modalContainer.querySelector('.close');
closeButton.addEventListener('click', function () {
  hideModal(modalContainer.id);
});

let cancelButton = modalContainer.querySelector('.btn-secondary');
cancelButton.addEventListener('click', function () {
  hideModal(modalContainer.id);
});

let saveButton = modalContainer.querySelector('.btn-primary');
saveButton.addEventListener('click', function (event) {
  event.preventDefault();
  // Perform form submission actions here
  hideModal(modalContainer.id);
});

// Add the modal container to the page
document.body.appendChild(modalContainer);

// Show the modal when the Edit button is clicked
editButton.addEventListener('click', function () {
  showModal(modalContainer.id);
});




    let deleteButton = document.createElement('button');
    deleteButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mx-2');
    deleteButton.textContent = "{{ __('main.delete') }}";
    actionsCell.appendChild(deleteButton);



    newRow.appendChild(actionsCell);

    // Add the new row to the table body
    let tableBody = document.querySelector('#classrooms-table tbody');
    tableBody.appendChild(newRow);




              }

          })
          .catch((error) => {
            console.log(error);
          });
      }, 500);
    });


  }


  function showModal(modalId) {
    let modal = document.getElementById(modalId);
    modal.classList.remove('hidden');
    modal.setAttribute('aria-hidden', false);
    modal.setAttribute('tabindex', 0);
    modal.focus();
  }


  function hideModal(modalId) {
    let modal = document.getElementById(modalId);
    modal.classList.remove('show');
    modal.setAttribute('aria-hidden', 'true');
    modal.style.display = 'none';
    document.body.classList.remove('modal-open');
  }


//           .catch((error) => {
//             console.error(error);
//           });
//       }, 500);
//     });

// }
