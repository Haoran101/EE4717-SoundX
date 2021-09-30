var passwordField = document.getElementById('Password');
var confirmPasswordField = document.getElementById('ConfirmPassword');
passwordField.addEventListener("change", confirmPassword);
confirmPasswordField.addEventListener("change", confirmPassword);

function confirmPassword(){
    console.log('triggered');
    var password = document.getElementById('Password').value;
    var confirmedPassword = document.getElementById('ConfirmPassword').value;
    if (password.length > 0 && confirmedPassword.length > 0 && confirmedPassword != password){
        document.getElementById("notSamePasswordAlert").innerHTML = "Password inputs are not the same!";
    }
    return null;
}