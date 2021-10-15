var checkoutButton = document.getElementById("checkout-button");
var zipCodeField = document.getElementById("zip_code");
var contactField = document.getElementById("receiver_contact");

contactField.addEventListener("change", validateContactNumber);
zipCodeField.addEventListener("change", validateZipCode);

function validateContactNumber(){
    let contact = contactField.value;
    let alert = document.getElementById("invalidContactAlert");
    if (contact.search(/^\d{8}$/) !== 0){
        alert.className = "alert";
        alert.innerHTML = "A valid phone number contains 8 digits.";
        checkoutButton.disabled = true;
    } else {
        alert.className = "";
        alert.innerHTML ="";
        checkoutButton.disabled = false;
    }
}

function validateZipCode(){
    let zip_code = zipCodeField.value;
    let alert = document.getElementById("invalidZipCodeAlert");
    if (zip_code.search(/^\d{6}$/) !== 0){
        alert.className = "alert";
        alert.innerHTML = "A valid Zip Code contains 6 digits.";
        checkoutButton.disabled = true;
    } else {
        alert.className = "";
        alert.innerHTML ="";
        checkoutButton.disabled = false;
    }
}


checkPaymentMethodSelected();
let radios = document.forms["checkout"].elements["payment_method"];
for (var radio of radios){
    radio.addEventListener("change", checkPaymentMethodSelected);
}


function checkPaymentMethodSelected(){
    let radios = document.forms["checkout"].elements["payment_method"];
    let selectedPayment = false
    for (var radio of radios){
        selectedPayment ||= radio.checked;
    }
    let alert = document.getElementById("noPaymentAlert");
    if (selectedPayment){
        alert.className = "";
        alert.innerHTML= "";
    } else {
        alert.className = "alert";
        alert.innerHTML = "Please Select Payment Method.";
    }
}

