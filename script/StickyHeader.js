window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

var placeholder = document.createElement('div');
placeholder.style.height = '100px';
placeholder.style.backgroundColor = 'transparent';

function myFunction() {
  if (window.scrollY > sticky) {
    header.style.backgroundColor = 'black';
    header.classList.add("sticky");
    document.body.insertBefore(placeholder, document.body.firstChild);
  } else {
    header.style.backgroundColor = 'transparent';
  }
}
