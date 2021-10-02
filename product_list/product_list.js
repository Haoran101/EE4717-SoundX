
function validateNumberInput(new_input){
    var isdecimal = new_input.value.search(/^[+-]?([0-9]+\.?[0-9]*|\.[0-9]+)$/); 
    if (isdecimal != 0){
        document.getElementById("alert-msg").innerHTML = "Not a valid number input, please try again! ";
        return;
    } else {
        document.getElementById("alert-msg").innerHTML = "";
    }
    
        if (parseFloat(new_input.value)<0){
            if (new_input.id == "min_price"){
                new_input.value = 0;
            } else {
                new_input.value = 1000;
            }
    }
}

if (filter_get !== undefined){
    console.log('captured!');
}