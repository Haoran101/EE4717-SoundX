
function validateNumberInput(new_input){
    if (new_input.value == null){
        new_input.value = (new_input.id == "min_price")? 0 : 1000;
    }

    var isdecimal = new_input.value.search(/^[+-]?([0-9]+\.?[0-9]*|\.[0-9]+)$/); 
    if (isdecimal !== 0){
        document.getElementById("alert-msg").innerHTML = "Not a valid number input, please try again! ";
        document.getElementById("alert-msg").className = "alert";
        return;
    } else {
        document.getElementById("alert-msg").innerHTML = "";
        document.getElementById("alert-msg").className = "";
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
    
    if (filter_get.brand){
        filter_get.brand.forEach(brand_id => {
            document.getElementById("brand" + brand_id).checked = true;
        });
        delete filter_get['brand'];
    }

   document.getElementById("min_price").value = (filter_get.min_price)? filter_get.min_price : 0;
   document.getElementById("max_price").value = (filter_get.max_price)? filter_get.max_price : 1000;
   delete filter_get['min_price'];
   delete filter_get['max_price'];

   for (const [key, value] of Object.entries(filter_get)) {
    document.getElementById(key).checked = true;
  }

}