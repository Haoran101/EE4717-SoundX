//Product Details Image Selector
function switchImage(image_id){
    var image = document.getElementById(image_id);
    var source = image.src;
    var big_image = document.getElementById("product_big_picture");
    big_image.src = source;
}

//Disable add to cart or buy now if no stock
function noStock(){
    var cartButton = document.getElementById('cart-button');
    var buyNowButton = document.getElementById('buy-button');
    cartButton.disabled = true;
    cartButton.style.backgroundColor = "grey";
    buyNowButton.disabled = true;
    buyNowButton.style.backgroundColor = "grey";
}
