function validateNumberInput(new_input){
    
    if (new_input !== null){
        if (new_input.value == ""){
            new_input.value = (new_input.id == "min_price")? 0 : 1000;
        }
    }
    var min_price_ele = document.getElementById("min_price"); 
    var max_price_ele = document.getElementById("max_price"); 
    var pattern = /^[+-]?([0-9]+\.?[0-9]*|\.[0-9]+)$/;
    if (min_price_ele.value.search(pattern) == 0 && max_price_ele.value.search(pattern) == 0){
        clearAlertMessage();
        if (parseFloat(min_price_ele.value)<0){
            min_price_ele.value = 0;
        }
        if (parseFloat(max_price_ele.value)<0){
            max_price_ele.value = 1000;
        }
    } else if (min_price_ele.value.search(pattern) !== 0){
        setAlertMessage();
        min_price_ele.value = 0;
    } else if (max_price_ele.value.search(pattern) !== 0){
        setAlertMessage();
        max_price_ele.value = 1000;
    }
}

validateNumberInput(null);

function setAlertMessage(){
    document.getElementById("alert-msg").innerHTML = "Not a valid number input, please try again! ";
    document.getElementById("alert-msg").className = "alert";
}

function clearAlertMessage(){
    document.getElementById("alert-msg").innerHTML = "";
    document.getElementById("alert-msg").className = "";
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