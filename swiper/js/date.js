
    // Get today's date in the format YYYY-MM-DD
    var today = new Date().toISOString().split("T")[0];

    // Get the date input element
    var dateInput = document.getElementById("starting-date");

    // Set the minimum value of the date input to today's date
    dateInput.setAttribute("min", today);

    // Function to handle the input event
    function handleDateInput(event) {
      // Get the selected date value
      var selectedDate = event.target.value;

      // Disable past dates
      if (selectedDate <> today) {
        // Clear the selected value
        dateInput.value = "";
      }
    }

    // Add an event listener to the date input
    dateInput.addEventListener("input", handleDateInput);
  
    // Get today's date in the format YYYY-MM-DD
    var today = new Date().toISOString().split("T")[0];

    // Get the date input element
    var dateInput = document.getElementById("ending-date");

    // Set the minimum value of the date input to today's date
    dateInput.setAttribute("min", today);

    // Function to handle the input event
    function handleDateInput(event) {
      // Get the selected date value
      var selectedDate = event.target.value;

      // Disable past dates
      if (selectedDate < today) {
        // Clear the selected value
        dateInput.value = "";
      }
    }

    // Add an event listener to the date input
    dateInput.addEventListener("input", handleDateInput);
 

   // Get today's date in the format YYYY-MM-DD
    var today = new Date().toISOString().split("T")[0];

    // Get the date input element
    var dateInput = document.getElementById("register");

    // Set the minimum value of the date input to today's date
    dateInput.setAttribute("min", today);

    // Function to handle the input event
    function handleDateInput(event) {
      // Get the selected date value
      var selectedDate = event.target.value;

      // Disable past dates
      if (selectedDate < today) {
        // Clear the selected value
        dateInput.value = "";
      }
    }
