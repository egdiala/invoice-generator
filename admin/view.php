<?php
require_once("../scripts/init.php");
require_once("../scripts/session_auth.php");
if (!$name) header("Refresh: 5; URL=/");
include("../scripts/header.php");

$conn = mysqli_connect($servername, $username, $password, $dbname);

$id = $_GET['id'];
$table = $_GET['tbl'];
$curr_date = date("Y");
$driver = '';
$vnum = '';

if ($table == "invoice") {
    $sql = $conn->query("SELECT date, customer, address, total_in_words FROM invoice WHERE invoice_no = '$id'");
    $row = $sql->fetch_assoc();
    unset($date, $name, $address);
    $date = "Date: " . $row['date'];
    $name = "Customer Name: " . $row['customer'];
    $address = "Address: " . $row['address'];
    $words = "Amount in Words: " . $row['total_in_words'];
    $inv = "Invoice Number: " . $id;

    $output = '';
    //get product details with invoice number
    $reply = $conn->query("SELECT qty, description, rate, amount FROM invoice_details WHERE id = '$id'");
    while ($row = mysqli_fetch_array($reply)) {
        $output .= '<tr>
                    <td>' . $row["qty"] . '</td>
                    <td>' . $row["description"] . '</td>
                    <td><span style="font-family: DejaVu Sans;">&#x20A6;</span>' . $row["rate"] . '</td>
                    <td><span style="font-family: DejaVu Sans;">&#x20A6;</span>' . $row["amount"] . '</td>
                    </tr>';
    }
} elseif ($table == "waybill") {
    $result = $conn->query("SELECT date, customer, address, driver, vehicle, total_in_words FROM waybill WHERE waybill_no = '$id'");
    $row = $result->fetch_assoc();
    unset($date, $name, $address, $driver, $vnum, $words);
    $date = "Date: " . $row['date'];
    $name = "Customer Name: " . $row['customer'];
    $address = "Address: " . $row['address'];
    $driver = "Driver: " . $row['driver'] . "<br/>";
    $vnum = "Vehicle Number" . $row['vehicle'] . "<br />";
    $words = "Amount in Words: " . $row['total_in_words'];
    $inv = "Invoice Number: " . $id;

    $output = '';
    //get product details with Waybill number
    $reply = $conn->query("SELECT description, qty, remark, total FROM waybill_details WHERE waybill_no = '$id'");
    while ($row = mysqli_fetch_array($reply)) {
        $output .= '<tr>
                    <td>' . $row["description"] . '</td>
                    <td>' . $row["qty"] . '</td>
                    <td>' . $row["remark"] . '</td>
                    <td>' . $row["total"] . '</td>
                    </tr>';
    }
}
?>

<div id="cont1">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
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
            <img src="../example.png " style="width: 125px; height: 125px;" />
        </div>
    </div>
    <div style="display:inline-block;">
        <div style="position:relative;left:10px;"><b>
                <font size="40" style="text-align:center;">ITTJWIMS NIG LTD.</font>
            </b></div>
        <div style="position:relative;left:10px;">
            <u>
                <font color="red"><b>We Represent </b> »</font>Tyre Manufacturers <font color="red">»</font> Oil Company <font color="red">»</font> Civil Engineering
            </u>
        </div>
        <div style="position:relative;left:10px;">
            <small><b>Office: </b>By Trinity Police Station, Opp. 1st Bank Industrial Road, Olodi Apapa - Lagos.<br>
                <b>Tel: </b>08033396685, 08086785911. <b>Email: </b>i_diala@yahoo.com</small>
        </div>
    </div>
    <div style="float: right;">
        <button type="button" name="print" class="btn btn-success" onclick="location.href='../scripts/reprint.php?id=<?php echo $id ?>&tbl=<?php echo $table ?>'">PRINT</button>
    </div>
    <br />
    <div style="float: right;"><?= $inv ?></div><br />
    <div style="position:relative; bottom: 25px;"><?= $name ?><br />
        <?= $address ?><br />
        <?= $driver ?>
        <?= $vnum ?>
        <?= $words ?><br />
        <?= $date ?></div><br />
    <br /><br />
    <table border="1" cellspacing="0" cellpadding="3">
        <tr>
            <th>Quantity</th>
            <th>Description</th>
            <th>Rate</th>
            <th>Amount</th>
        </tr>
        <?= $output ?>
    </table>
    <div style="width: 100%; overflow: hidden; margin-top: 250px">
        <div style="width: 250px; float: left;">
            <center>......................................</center><br />
            <center>Customer Signature</center>
        </div>
        <div style="width: 250px; float: right;">
            <center>......................................</center><br />
            <center>ITTJWIMS Signature</center>
        </div>
    </div>
    <footer>
        Copyright &copy; <?= $curr_date ?>
    </footer>
</div>