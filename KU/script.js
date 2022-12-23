function onClickMenu(){
	document.getElementById("toggle").classList.toggle("change");
    document.getElementById("site").classList.toggle("change");
	document.getElementById("menu-list").classList.toggle("change");
	document.getElementById("menu-bg").classList.toggle("change-bg");
}

var slideIndex,total,count;
// Open the Modal
function igopenModal(n,e) {
slideIndex=n;
document.getElementById("igmyModal").style.display = "block";
list = e.parentNode.parentNode.childNodes;

count = Array.from(e.parentElement.parentElement.children).indexOf(e.parentNode)+1;
let img=[];
for (var i = 0; i < list.length; i++) {
    if(i % 2 != 0) { // index is odd for skipping text
        img.push(list[i]);
    }
}
total = img.length;

  showSlides(n);
}

// Close the Modal
function igcloseModal() {
  document.getElementById("igmyModal").style.display = "none";
}


// showSlides(slideIndex);

// Next/previous controls
function igplusSlides() {
  count++;
  showSlides(slideIndex += 1);
}

function igminusSlides() {
  count--;
  showSlides(slideIndex -= 1);
}


function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("igmySlides");


if(total < count || count == 0)
  igcloseModal();

  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  
  slides[slideIndex-1].style.display = "block";
}