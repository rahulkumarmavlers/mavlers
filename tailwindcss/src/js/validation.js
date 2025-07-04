
const form = document.getElementById('contact-form');
form.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevent the form from submitting the traditional way
  let isValid = true;
  // All input fields Id
  const requiredFields = ['Name', 'Email', 'Organisation', 'Help'];

  requiredFields.forEach(function(fieldId) {
    const input = document.getElementById(fieldId);
    const errorSpan = document.getElementById(fieldId.toLowerCase() + '-error');
    if (!input.value.trim()) {
      input.classList.add('border-danger');
      if (errorSpan) {
        errorSpan.style.display = 'block';
      }
      isValid = false;
    } else {
      input.classList.remove('border-danger');
      if (errorSpan) {
        errorSpan.style.display = 'none';
      }
    }
  });

  if (isValid) {
    // Submit the form programmatically if valid
    alert("Form Submitted");
    requiredFields.forEach(function(fieldId) {
      document.getElementById(fieldId).value = "";
      document.getElementById("aboutus").value= "";
    });
  }
});