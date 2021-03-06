var signUpButton = document.getElementById("signup-button");
var passwordField = document.getElementById('Password');
var confirmPasswordField = document.getElementById('ConfirmPassword');
var contactField = document.getElementById("Contact");
var emailField = document.getElementById("Email");
var firstNameField = document.getElementById("FirstName");
var lastNameField = document.getElementById("LastName");

firstNameField.addEventListener("change", validateName);
lastNameField.addEventListener("change", validateName);
passwordField.addEventListener("change", confirmPassword);
confirmPasswordField.addEventListener("change", confirmPassword);
contactField.addEventListener("change", validateContactNumber);
emailField.addEventListener("change", validateEmail);

function validateName(e){
    let name = e.currentTarget.value;
    let alert = document.getElementById("invalidNameAlert");
    if (name.search(/^[a-zA-Z\s-]+$/) !== 0){
        alert.className = "alert";
        alert.innerHTML = "Name should only contain letters, space or -";
        signUpButton.disabled = true;
    } else {
        alert.className = "";
        alert.innerHTML ="";
        signUpButton.disabled = false;
    }
}

function validateContactNumber(){
    let contact = contactField.value;
    let alert = document.getElementById("invalidContactAlert");
    if (contact.search(/^\d{8}$/) !== 0){
        alert.className = "alert";
        alert.innerHTML = "A valid phone number contains 8 digits.";
        signUpButton.disabled = true;
    } else {
        alert.className = "";
        alert.innerHTML ="";
        signUpButton.disabled = false;
    }
}

function validateEmail(){
    let email = emailField.value;
    console.log(email);
    let alert = document.getElementById("invalidEmailAlert");
    if (/^[\w\.-]+@([\w]+\.){1,3}[\w]+$/.test(email)){
        alert.innerHTML ="";
        alert.className = "";
        signUpButton.disabled = false;
    } else {
        alert.className = "alert";
        alert.innerHTML = "Please enter a valid email.";
        signUpButton.disabled = true;
    }
}

function confirmPassword(){
    var password = document.getElementById('Password').value;
    var confirmedPassword = document.getElementById('ConfirmPassword').value;
    let alert =  document.getElementById("notSamePasswordAlert");
    if (password.length > 0 && confirmedPassword.length > 0){
        if (confirmedPassword != password){
            alert.className = "alert";
            alert.innerHTML = "Password input is not matched. Please try again.";
            signUpButton.disabled = true;
        } else {
            alert.className = "";
            alert.innerHTML = "";
            signUpButton.disabled = false;
        }
    }
}