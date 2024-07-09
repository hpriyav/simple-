// Function to validate the form and handle AJAX submission
function validateForm(event) {

    // Get the form data
    var formData = new FormData(document.querySelector('.formclass'));

    // Get the mobile number and emergency number inputs
    var mobileInput = document.getElementById("mobile");
    var emergencyInput = document.getElementById("emergency_phno");

    // Get the values of the inputs
    var mobileNumber = mobileInput.value;
    var emergencyNumber = emergencyInput.value;

    // Check if mobile number and emergency number are not empty
    if (mobileNumber.trim() === "" || emergencyNumber.trim() === "") {
        alert("Please enter both mobile number and emergency number.");
        return false;
    }

    // Check if mobile number and emergency number have 10 digits
    if (mobileNumber.length !== 10 || emergencyNumber.length !== 10) {
        alert("Mobile number and emergency number should have 10 digits.");
        return false;
    }

    // Check if mobile number and emergency number are same
    if (mobileNumber === emergencyNumber) {
        alert("Mobile number and emergency number should not be the same.");
        return false;
    }

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure the request
    xhr.open('POST', 'slot_book.php', true);

    // Define the callback function to handle the response
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Request was successful
            // Handle the response here, if needed
            console.log(xhr.responseText);
        } else {
            // Request failed
            console.error('Request failed with status:', xhr.status);
        }
    };

    // Handle network errors
    xhr.onerror = function() {
        console.error('Request failed');
    };

    // Send the form data
    xhr.send(formData);
    // Function to validate the form and submit using AJAX

    // Prevent default form submission
    event.preventDefault();

    // Your validation logic here

    // If validation passes, submit the form using AJAX
    // Example AJAX code goes here


    // Prevent form submission
    return false;

}
