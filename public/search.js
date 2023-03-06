


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
