function caricaFooter() {
var divFooter = document.createElement('div');
    divFooter.setAttribute('id', 'footerContainer');
    divFooter.setAttribute('include-html', 'footer.html');
    divFooter.load = function () {
        var includeHTML = this.getAttribute('include-html');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                divFooter.innerHTML = this.responseText;
            }
        };
        xhttp.open('GET', includeHTML, true);
        xhttp.send();
    };
    divFooter.load();
    document.body.appendChild(divFooter);
}

caricaFooter();

    