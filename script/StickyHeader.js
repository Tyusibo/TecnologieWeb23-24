window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.scrollY > sticky) {
    header.style.backgroundColor = 'black';
  } else {
    header.style.backgroundColor = 'transparent';
  }
}

function showRectangle() {
  var overlay = document.getElementById('overlay');
  overlay.style.display = 'flex';
}

function hideRectangle() {
  var overlay = document.getElementById('overlay');
  overlay.style.display = 'none';
}

function goToAccountPage() {
  window.location.href = 'account.php';
}
