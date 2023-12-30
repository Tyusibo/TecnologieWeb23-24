function caricaHeader() {
    var divHeader = document.createElement('div');
    divHeader.setAttribute('id', 'headerContainer');
    divHeader.setAttribute('include-html', 'header.html');
    divHeader.load = function () {
        var includeHTML = this.getAttribute('include-html');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                divHeader.innerHTML = this.responseText;
            }
        };
        xhttp.open('GET', includeHTML, true);
        xhttp.send();
    };
    divHeader.load();
    document.body.insertBefore(divHeader, document.body.firstChild);
}

caricaHeader();
   
        window.onscroll = function() {myFunction()};
        
        var header = document.getElementById("headerContainer");
        var sticky = header.offsetTop;
        
        function myFunction() {
          if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
          } else {
            header.classList.remove("sticky");
          }
        }
