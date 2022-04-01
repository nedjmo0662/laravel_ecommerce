

var xhttp = new XMLHttpRequest();
xhttp.onload = function() {
    if (this.readyState == 4 && this.status == 200) {
        // Typical action to be performed when the document is ready:
        console.log(xhttp.responseText);
        document.getElementById("demo").innerHTML = xhttp.responseText;
    }
};

var data = JSON.stringify(body);
xhttp.open("get", "http://localhost:8000/api/users",false);
xhttp.setRequestHeader("Accept", "Application/json");
xhttp.setRequestHeader("Content-type", "Application/json");
xhttp.setRequestHeader("Authorization", "5|HaCSGHg8hiPcDVmol89OS2UitSnfXhGzUZuCc1Ln");
xhttp.send();
// xhttp.setRequestHeader("Access-Control-Allow-origin", "*");
// xhttp.setRequestHeader("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");