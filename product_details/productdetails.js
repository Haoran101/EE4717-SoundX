//Product Details Image Selector
function switchImage(image_id){
    var image = document.getElementById(image_id);
    var source = image.src;
    var big_image = document.getElementById("product_big_picture");
    big_image.src = source;
}

//view in cart action after add item to cart
var viewInCartBtn = document.getElementById("view-cart-button");
viewInCartBtn.addEventListener("click", switchToCart);

function switchToCart(){
  window.location.href = "http://192.168.56.2/f32ee/EE4717-SoundX/cart/";
}