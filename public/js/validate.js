function validate() {
    var bill = document.getElementById('bill').value;
    if (bill === "") {
        document.getElementById("billerr").innerHTML="<span class='error'>*Bill number is required</span>"
        return false;
    }
    var selelements = document.getElementsByClassName('forall');
    var quantelements = document.getElementsByClassName('quant');
    var priceelements = document.getElementsByClassName('price');
    var stockelements = document.getElementsByClassName('stock');
    for (var i = 0; i < selelements.length; i++) {
        var selelement = selelements[i];
        var quantelement = quantelements[i];
        var priceelement = priceelements[i];
        var stockelement = stockelements[i];
        var stockele = parseInt(stockelement.value);
        var quantele = parseInt(quantelement.value);
        if (selelement.value === "" || quantelement.value === "" || priceelement.value === "" || stockelement.value === "") {
            document.getElementById('errormsg').innerHTML = "<div class='errored' id='errored'>Insert all values in input fields.</div> ";
            return false;
        }
        if (quantele > stockele) {
            document.getElementById('errormsg').innerHTML = "<div class='errored' id='errored'>Requested quantity of " + selelement.value + " cannot be granted.</div> ";
            return false;
        }
    }
    var date = document.getElementById('date').value;
    var custname = document.getElementById('custname').value;
    if (date === "") {
        document.getElementById("dateerror").innerHTML="<span class='error'>*Date is required</span>"
        return false;
    }  
    if (custname === "") {
        document.getElementById("nameerror").innerHTML="<span class='error'>*Customer name is required</span>"
        return false;
    }
    else{
        return true;
    }

}