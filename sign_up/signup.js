var signUpButton = document.getElementById("signup-button");
var passwordField = document.getElementById('Password');
var confirmPasswordField = document.getElementById('ConfirmPassword');
var contactField = document.getElementById("Contact");
var emailField = document.getElementById("Email");

passwordField.addEventListener("change", confirmPassword);
confirmPasswordField.addEventListener("change", confirmPassword);
contactField.addEventListener("change", validateContactNumber);
emailField.addEventListener("change", validateEmail);

function validateContactNumber(){
    let contact = contactField.value;
    let alert = document.getElementById("invalidContactAlert");
    if (contact.search(/^\d{8}$/) !== 0){
        alert.innerHTML = "A valid phone number contains 8 digits.";
        signUpButton.disabled = true;
    } else {
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
        signUpButton.disabled = false;
    } else {
        alert.innerHTML = "Please Enter a valid email!";
        signUpButton.disabled = true;
    }
}

function confirmPassword(){
    var password = document.getElementById('Password').value;
    var confirmedPassword = document.getElementById('ConfirmPassword').value;
    let alert =  document.getElementById("notSamePasswordAlert");
    if (password.length > 0 && confirmedPassword.length > 0){
        if (confirmedPassword != password){
            alert.innerHTML = "Password inputs are not the same!";
            signUpButton.disabled = true;
        } else {
            alert.innerHTML = "";
            signUpButton.disabled = false;
        }
    }
}