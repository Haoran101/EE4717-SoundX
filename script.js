/*display top banner */
var pageNumber = 1;
display(pageNumber);

// Next/previous controls
function next(n) {
  display(pageNumber += n);
}

// Thumbnail image controls
function currentSlide(n) {
  display(pageNumber = n);
}

function display(n) {
  var i;
  var slides = document.getElementsByClassName("banner-page");
  if (n > slides.length) {pageNumber = 1;}
  if (n < 1) {pageNumber = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[pageNumber-1].style.display = "block";
}
