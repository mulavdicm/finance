function showBalance(str) {
    if (str === "") {
        document.getElementById("balance").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("balance").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../getbalance.php?q=" + str, true);
        xmlhttp.send();
    }
}