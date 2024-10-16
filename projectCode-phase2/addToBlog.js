window.onload = function() {
  const clearButton = document.querySelector('input[type="reset"]');
  clearButton.addEventListener('click', function(event) {
      event.preventDefault();

      const isConfirmed = confirm('Are you sure you want to clear the form?');
      if (isConfirmed) {
          const form = document.querySelector('form');
          form.reset();
      }
  });

  const form = document.querySelector('form');
  form.addEventListener('submit', function(event) {
      if (!validateForm()) {
          event.preventDefault();
      }
  });
}

function validateForm() {
  const title = document.getElementById("titleBox");
  const description = document.getElementById("textBox");
  let isValid = true;

  if (title.value == "") {
    title.classList.add("missing");
    isValid = false;
  } else {
    title.classList.remove("missing");
  }

  if (description.value == "") {
    description.classList.add("missing");
    isValid = false;
  } else {
    description.classList.remove("missing");
  }

  if (!isValid) {
    alert("Please fill in all fields.");
  }

  return isValid;
}