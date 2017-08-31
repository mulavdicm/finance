function sendDataTransaction() {
    var type = document.getElementById("type").value;    
    var date = document.getElementById("date").value;
    var fromAccount = document.getElementById("account_from").value;
    var toAccount = document.getElementById("account_to").value;    
    var account = document.getElementById("account").value;
    var category = document.getElementById("category").value;
    var subcategory = document.getElementById("subcategory").value;
    var contents = document.getElementById("contents").value;
    var amount = document.getElementById("amount").value;
    var currency = document.getElementById("currency").value;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log("story " + type + " story");   
            console.log("story " + date + " story"); 
            console.log("story " + fromAccount + " story"); 
            console.log("story " + toAccount + " story"); 
            console.log("story " + account + " story"); 
            console.log("story " + category + " story"); 
            console.log("story " + subcategory + " story"); 
            console.log("story " + contents + " story");
            console.log("story " + amount + " story"); 
            console.log("story " + currency + " story");           
        } else {
            console.log('error');
        }
    };
    xmlhttp.open(
        "GET",
        "../insert_transaction.php?type=" + type +
        "&date=" + date +
        "&account_from=" + fromAccount +
        "&account_to=" + toAccount +
        "&account=" + account + 
        "&category=" + category + 
        "&subcategory=" + subcategory +
        "&contents=" + contents +
        "&amount=" + amount +
        "&currency=" + currency,
        true
    );
    xmlhttp.send();
}
