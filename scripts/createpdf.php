<?php

namespace Dompdf;

require_once 'init.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);

//get invoice number
$sql = $conn->query("SELECT invoice_no FROM invoice_details ORDER BY id DESC LIMIT 1");
$row = $sql->fetch_assoc();
unset($invID);
$invID = $row['invoice_no'];

//get details with invoice number
$result = $conn->query("SELECT date, customer, address, total_in_words FROM invoice WHERE invoice_no = '$invID'");
$row = $result->fetch_assoc();
unset($date, $name, $address);
$date = $row['date'];
$name = $row['customer'];
$address = $row['address'];
$words = $row['total_in_words'];

$output = '';
//get product details with invoice number
$reply = $conn->query("SELECT qty, description, rate, amount FROM invoice_details WHERE invoice_no = '$invID'");
while ($row = mysqli_fetch_array($reply)) {
    $output .= '<tr>
     <td>' . $row["qty"] . '</td>
     <td>' . $row["description"] . '</td>
     <td><span style="font-family: DejaVu Sans;">&#x20A6;</span>' . $row["rate"] . '</td>
     <td><span style="font-family: DejaVu Sans;">&#x20A6;</span>' . $row["amount"] . '</td>
     </tr>';
}
$curr_date = date("Y");

require_once('../dompdf/autoload.inc.php');
$dompdf = new Dompdf();
$dompdf->load_html('
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

footer {
    position: fixed; 
    bottom: -60px; 
    left: 0px; 
    right: 0px;
    height: 50px; 
}
</style>
<div style="display:inline-block;">
<div style="position:relative;left:5px;">
    <img src="../example.png " style="width: 125px; height: 125px;"/>
    </div>
</div>
<div style="display:inline-block;">
    <div style="position:relative;left:10px;"><b>
       <font size="40" style="text-align:center;">ITTJWIMS NIG LTD.</font>
    </b></div>
    <div style="position:relative;left:10px;">
    <u>
        <font color="red"><b>We Represent </b> »</font>Tyre Manufacturers <font color="red">»</font>Oil Company <font color="red">»</font>Civil Engineering
    </u>
    </div>
    <div style="position:relative;left:10px;">
    <small><b>Office: </b>By Trinity Police Station, Opp. 1st Bank Industrial Road, Olodi Apapa - Lagos.<br>
                    <b>Tel: </b>08033396685, 08086785911. <b>Email: </b>i_diala@yahoo.com</small>
    </div>
</div><br />
Invoice Number: ' . $invID . '<br />
Customer Name: ' . $name . '<br />
Date: ' . $date . '<br />
Address: ' . $address . '<br />
Amount in Words: ' . $words . '<br />
<br /><br />
<table border="1"  cellspacing="0" cellpadding="3">
    <tr>
    <th width="10%">Quantity</th>
    <th width="50%">Description</th>
    <th width="10%">Rate</th>
    <th width="30%">Amount</th>
    </tr>
' . $output . '
    </table>
    <div style="width: 100%; overflow: hidden; margin-top: 250px">
        <div style="width: 250px; float: left;">
            <center>......................................</center><br />
            <center>Customer Signature</center>
        </div>
        <div style="margin-left: 260px;">
            <center>......................................</center><br />
            <center>ITTJWIMS Signature</center>
        </div>
    </div>
    <footer>
        Copyright &copy; ' . $curr_date . '
    </footer>
    ');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream($invID . ".pdf");
exit(0);
