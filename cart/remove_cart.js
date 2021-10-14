function removeItemFromCart(){
    var hiddenInput = document.getElementById("removed-placeholder");
    hiddenInput.value = "true";
    var form = document.getElementById("cart-form");
    form.submit();
}