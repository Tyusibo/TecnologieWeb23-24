window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

var placeholder = document.createElement('div');
placeholder.style.height = '100px';
placeholder.style.backgroundColor = 'transparent';
document.body.insertBefore(placeholder, document.body.firstChild);

function myFunction() {
  if (window.scrollY > sticky) {
    header.style.backgroundColor = 'black';
  } else {
    header.style.backgroundColor = 'transparent';
  }
}
