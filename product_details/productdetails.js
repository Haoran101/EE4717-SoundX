//Product Details Image Selector
function switchImage(image_id){
    var image = document.getElementById(image_id);
    var source = image.src;
    var big_image = document.getElementById("product_big_picture");
    big_image.src = source;
  }