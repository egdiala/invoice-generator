function load_form2() {
    $("#index").load("waybill.php #form2");
}

function load_index() {
    $("#form2").load("index.php #index");
}

function load_login() {
    reg = document.getElementById("signin").innerHTML;
    if (reg == "Register") {
        $("#cont1").load("register.php #cont1");
        document.getElementById("signin").innerHTML = "Login";
    } else {
        $("#cont1").load("index.php #cont1");
        document.getElementById("signin").innerHTML = "Register";
    }
}

function load_profile() {
    $("#cont1").load("/admin/profile.php #cont1");
}

function load_record() {
    $("#cont1").load("/admin/record.php #cont1");
}

function load_settings() {
    $("#cont1").load("/admin/settings.php #cont1");
}

function load_invoice() {
    $("#cont1").load("/admin/invoice.php #cont1");
}

function load_waybill() {
    $("#cont1").load("/admin/waybill.php #cont1");
}

//adds a new row in invoice
function nrow() {
    var itm = document.getElementById("tr");
    var cln = itm.cloneNode(true);
    var cln2 = cln.querySelectorAll("input");
    var i;
    for (i = 0; i < cln2.length; i++) {
        cln2[i].value = "";
    }
    document.getElementById("tbdy").appendChild(cln);
}

//view and unview password in settings
function passview() {
    var x = document.getElementById("pswd");
    var e = document.getElementById("eye");
    if (x.type === "password") {
        x.type = "text";
        e.className = "fas fa-eye-slash";
    } else {
        x.type = "password";
        e.className = "fas fa-eye";
    }
}

//removes last row in invoice
function myFunction() {
    var parent = document.getElementById("tbdy");
    var child = document.getElementById("tbdy").lastElementChild;
    var c = document.getElementById("tbdy").children.length;
    if (c > 1) {
        parent.removeChild(child);
        getValues();
    } else {
        alert("You must have at least 2 rows!");
    }
    //parent.removeChild(child);
    //getValues();
}

/**
 * Convert an integer to its words representation
 *
 * @author McShaman (http://stackoverflow.com/users/788657/mcshaman)
 * @source http://stackoverflow.com/questions/14766951/convert-digits-into-words-with-javascript
 */
function numberToEnglish(n, custom_join_character) {
    var string = n.toString(),
        units,
        tens,
        scales,
        start,
        end,
        chunks,
        chunksLen,
        chunk,
        ints,
        i,
        word,
        words;

    var and = custom_join_character || "and";

    /* Is number zero? */
    if (parseInt(string) === 0) {
        return "Zero";
    }

    /* Array of units as words */
    units = [
        "",
        "One",
        "Two",
        "Three",
        "Four",
        "Five",
        "Six",
        "Seven",
        "Eight",
        "Nine",
        "Ten",
        "Eleven",
        "Twelve",
        "Thirteen",
        "Fourteen",
        "Fifteen",
        "Sixteen",
        "Seventeen",
        "Eighteen",
        "Nineteen"
    ];

    /* Array of tens as words */
    tens = [
        "",
        "",
        "Twenty",
        "Thirty",
        "Forty",
        "Fifty",
        "Sixty",
        "Seventy",
        "Eighty",
        "Ninety"
    ];

    /* Array of scales as words */
    scales = [
        "",
        "Thousand",
        "Million",
        "Billion",
        "Trillion",
        "Quadrillion",
        "Quintillion",
        "Sextillion",
        "Septillion",
        "Octillion",
        "Nonillion",
        "Decillion",
        "Undecillion",
        "Duodecillion",
        "Tredecillion",
        "Quatttuor-decillion",
        "Quindecillion",
        "Sexdecillion",
        "Septen-decillion",
        "Octodecillion",
        "Novemdecillion",
        "Vigintillion",
        "Centillion"
    ];

    /* Split user arguemnt into 3 digit chunks from right to left */
    start = string.length;
    chunks = [];
    while (start > 0) {
        end = start;
        chunks.push(string.slice((start = Math.max(0, start - 3)), end));
    }

    /* Check if function has enough scale words to be able to stringify the user argument */
    chunksLen = chunks.length;
    if (chunksLen > scales.length) {
        return "";
    }

    /* Stringify each integer in each chunk */
    words = [];
    for (i = 0; i < chunksLen; i++) {
        chunk = parseInt(chunks[i]);

        if (chunk) {
            /* Split chunk into array of individual integers */
            ints = chunks[i]
                .split("")
                .reverse()
                .map(parseFloat);

            /* If tens integer is 1, i.e. 10, then add 10 to units integer */
            if (ints[1] === 1) {
                ints[0] += 10;
            }

            /* Add scale word if chunk is not zero and array item exists */
            if ((word = scales[i])) {
                words.push(word);
            }

            /* Add unit word if array item exists */
            if ((word = units[ints[0]])) {
                words.push(word);
            }

            /* Add tens word if array item exists */
            if ((word = tens[ints[1]])) {
                words.push(word);
            }

            /* Add 'and' string after units or tens integer if: */
            if (ints[0] || ints[1]) {
                /* Chunk has a hundreds integer or chunk is the first of multiple chunks */
                if (ints[2] || (!i && chunksLen)) {
                    words.push(and);
                }
            }

            /* Add hundreds word if array item exists */
            if ((word = units[ints[2]])) {
                words.push(word + " hundred");
            }
        }
    }

    return words.reverse().join(" ");
}

//does the complete calculation for invoice
function getValues() {
    var grandtotal = 0;
    var rows = document.querySelectorAll("tr.package-row");
    rows.forEach(function(currentRow) {
        var quantity = Number(currentRow.querySelector(".quantity").value);
        var rate = Number(currentRow.querySelector(".rate").value);
        var total = 0;

        document.querySelectorAll("quantity");

        if (quantity == "" || isNaN(quantity) || isNaN(rate)) {
            alert("Input a number");
        } else {
            total = quantity * rate;
        }
        currentRow.querySelector(".amount").value = total;
        grandtotal += total;
        document.getElementById("total").value = grandtotal;
        var and = numberToEnglish(grandtotal);
        var res = and.split(" ", 1);
        if (res == "and") {
            document.getElementById("words").value =
                numberToEnglish(grandtotal).substr(4) + " Naira Only";
        } else {
            document.getElementById("words").value =
                numberToEnglish(grandtotal) + " Naira Only";
        }
    });
}

//add up quantity of goods in waybill
function getSum() {
    var Total = 0;
    var rows = document.querySelectorAll("tr.package-row");
    rows.forEach(function(currentRow) {
        var quantity = Number(currentRow.querySelector(".quantity").value);

        document.querySelectorAll("quantity");

        if (quantity == "" || isNaN(quantity)) {
            document.getElementById("total").value = total;
            alert("Input a number");
        }
        Total += quantity;
        document.getElementById("total").value = Total;

        var and = numberToEnglish(Total);
        var res = and.split(" ", 1);
        if (res == "and") {
            document.getElementById("words").value = numberToEnglish(Total).substr(4);
        } else {
            document.getElementById("words").value = numberToEnglish(Total);
        }
    });
}

//minus button for waybill
function myFunction1() {
    var parent = document.getElementById("tbdy");
    var child = document.getElementById("tbdy").lastElementChild;
    var c = document.getElementById("tbdy").children.length;
    if (c > 1) {
        parent.removeChild(child);
        getSum();
    } else {
        alert("You must have at least 2 rows!");
    }
}