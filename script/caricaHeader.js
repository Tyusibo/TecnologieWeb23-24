function caricaHeader() {
    var divHeader = document.createElement('div');
    divHeader.setAttribute('id', 'headerContainer');
    divHeader.setAttribute('include-html', 'header.html');
    divHeader.classList.add("headertransition");
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
