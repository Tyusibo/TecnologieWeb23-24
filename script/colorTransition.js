window.onscroll = function() {myFunction()};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.scrollY > sticky) {
    header.style.backgroundColor = 'black';
  } else {
    header.style.backgroundColor = 'transparent';
  }
}

