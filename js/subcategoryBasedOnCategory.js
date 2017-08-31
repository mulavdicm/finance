function filterSubcategory(str) {
    if (str === "") {
        document.getElementById("subcategory").innerHTML = "No category selected";
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
                document.getElementById("subcategory").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getsubcategory.php?q=" + str, true);
        xmlhttp.send();
    }
}