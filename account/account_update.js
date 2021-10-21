function displayUpdateContent(){
    document.getElementById("update-button").hidden = true;
    document.getElementById("name-display").hidden = true;
    document.getElementById("first-name-update").hidden = false;
    document.getElementById("last-name-update").hidden = false;
    document.getElementById("contact-display").hidden = true;
    document.getElementById("contact-update").hidden = false;
    document.getElementById("confirm-update-button").type = "submit";
    document.getElementById("confirm-update-button").value = "Save";
    document.getElementById("logout-button").type = "hidden";
}

var contactField = document.getElementById("contact-update");
var confirmButton = document.getElementById("confirm-update-button");
contactField.addEventListener("change", validateContactNumber);

function validateContactNumber(){
    let contact = contactField.value;
    let alert = document.getElementById("invalidContactAlert");
    if (contact.search(/^\d{8}$/) !== 0){
        alert.className = "alert";
        alert.innerHTML = "A valid phone number contains 8 digits.";
        confirmButton.disabled = true;
    } else {
        alert.className = "";
        alert.innerHTML ="";
        confirmButton.disabled = false;
    }
}