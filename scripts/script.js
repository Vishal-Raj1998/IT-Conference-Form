
document.addEventListener("DOMContentLoaded", function() {
    // Add event listener for form submission
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        var checkbox = document.getElementById("exampleCheck1");
        if (!checkbox.checked) {
            event.preventDefault(); // Prevent form submission
            alert("Please check the checkbox to submit the form.");
        }
    });
});

