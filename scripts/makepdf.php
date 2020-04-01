<?php

namespace Dompdf;

require_once 'init.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);

//get Waybill number
$sql = $conn->query("SELECT waybill_no FROM waybill_details ORDER BY id DESC LIMIT 1");
$row = $sql->fetch_assoc();
unset($wblID);
$wblID = $row['waybill_no'];

//get details with Waybill number
$result = $conn->query("SELECT date, customer, address, driver, vehicle, total_in_words FROM waybill WHERE waybill_no = '$wblID'");
$row = $result->fetch_assoc();
unset($date, $name, $address, $driver, $vnum, $words);
$date = $row['date'];
$name = $row['customer'];
$address = $row['address'];
$driver = $row['driver'];
$vnum = $row['vehicle'];
$words = $row['total_in_words'];

$output = '';
//get product details with Waybill number
$reply = $conn->query("SELECT description, qty, remark, total FROM waybill_details WHERE waybill_no = '$wblID'");
while ($row = mysqli_fetch_array($reply)) {
    $output .= '<tbody>
     <tr>
     <td>' . $row["description"] . '</td>
     <td>' . $row["qty"] . '</td>
     <td>' . $row["remark"] . '</td>
     </tr>
              </tbody>';
    $total = '<td>' . $row["total"] . '</td>';
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
Waybill Number: ' . $wblID . '<br />
Customer Name: ' . $name . '<br />
Date: ' . $date . '<br />
Driver: ' . $driver . '<br />
Vehicle Number: ' . $vnum . '<br />
Address: ' . $address . '<br />
Amount in Words: ' . $words . '<br />
<br /><br />
<table border="1"  cellspacing="0" cellpadding="3">
    <thead>
    <tr>
    <th width="50%">Description</th>
    <th width="10%">Quantity</th>
    <th width="10%">Remark</th>
    </tr>
    </thead>
' . $output . '
    <tfoot>
    <tr>
      <td></td>
' . $total . '
      <td></td>
    </tr>
    </tfoot>
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
$dompdf->stream($wblID . ".pdf");
exit(0);
