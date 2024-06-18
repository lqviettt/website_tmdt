function checkName() {
  var name = document.getElementById("name").value;
  var nameError = document.getElementById("nameError");
  var namePattern = /^[a-zA-Z\s]+$/;

  if (!namePattern.test(name) || name.trim() === "") {
    nameError.style.display = "block";
    return false;
  } else {
    nameError.style.display = "none";
    return true;
  }
}

function checkNumber() {
  var number = document.getElementById("number").value;
  var numberError = document.getElementById("numberError");
  var phonePattern = /^[0-9]{10}$/;

  if (!phonePattern.test(number)) {
    numberError.style.display = "block";
    return false;
  } else {
    numberError.style.display = "none";
    return true;
  }
}

function checkEmail() {
  var email = document.getElementById("email").value;
  var emailError = document.getElementById("emailError");
  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  if (!emailPattern.test(email)) {
    emailError.style.display = "block";
    return false;
  } else {
    emailError.style.display = "none";
    return true;
  }
}

function validateForm(event) {
  var isNameValid = checkName();
  var isNumberValid = checkNumber();
  var isEmailValid = checkEmail();

  if (!isNameValid || !isNumberValid || !isEmailValid) {
    event.preventDefault(); 
    return false;
  }
  return true;
}

function validateForm() {
  return checkEmail();
}
