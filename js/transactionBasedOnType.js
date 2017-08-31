function filterTransaction(str) {
    if (str === "") {
        document.getElementById("transaction_type").innerHTML = "No type";
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
                if (this.responseText == "Transfer") {
                var category = document.getElementById("category").innerHTML;
                var subcategory = document.getElementById("subcategory")
                    category.setAttribute("disabled", "disabled");
                }
            }
        };
        xmlhttp.open("GET", "../get_transaction.php?type=" + str, true);
        xmlhttp.send();
    }
}