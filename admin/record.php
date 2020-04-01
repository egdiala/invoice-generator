<?php
require_once("../scripts/init.php");
require_once("../scripts/session_auth.php");
if (!$name) header("Refresh: 5; URL=/");
include("../scripts/header.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
?>

<p></p>

<?php
if (empty($name)) {
    echo "<h2>YOU NEED TO LOGIN!</h2>";
} else {
    ?>
    <div id="cont1">
        <fieldset class="scheduler-border">
            <div class="container">
                <div class="form-row">
                    <div class="col-12"><b>RECORDS</b></div>
                    <p id="para"></p>
                </div>
                <div class="form-group">
                    <div class="row input-group">
                        <form method="POST">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="tags">Table Names</label>
                                </div>
                                <select name="tbl" class="form-control tags" id="tags" data-role="tagsinput">
                                    <option></option>
                                    <option value="Invoice">Invoice</option>
                                    <option value="Waybill">Waybill</option>
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" name="search" class="btn btn-primary search" id="search">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <br />


            <div class="table-responsive">
                <div align="left">
                    <p><b>Total Records - <span id="total_records" class="total_records"></span></b></p>
                </div>
                <?php
                    if (isset($_POST['search'])) {
                        $opt = $_POST['tbl'];
                        if ($opt == "Waybill") {
                            $query = $conn->query("SELECT id, waybill_no, date, customer, address, driver, vehicle, total FROM waybill");
                            ?>


                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S/No</th>
                                    <th>Waybill Number</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Address</th>
                                    <th>Driver</th>
                                    <th>Vehicle Number</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $query->fetch_assoc()) { ?>
                                    <tr onclick="location.href='view.php?id=<?= $row['waybill_no'] ?>&tbl=waybill'">
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['waybill_no'] ?></td>
                                        <td><?= $row['date'] ?></td>
                                        <td><?= $row['customer'] ?></td>
                                        <td><?= $row['address'] ?></td>
                                        <td><?= $row['driver'] ?></td>
                                        <td><?= $row['vehicle'] ?></td>
                                        <td><?= $row['total'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } elseif ($opt == "") {
                                echo "You have not made any selection";
                            } else {
                                $sql = $conn->query("SELECT id, invoice_no, date, customer, address, total FROM invoice");
                                ?>


                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S/No</th>
                                    <th>Invoice Number</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Address</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $sql->fetch_assoc()) { ?>
                                    <tr onclick="location.href='view.php?id=<?= $row['invoice_no'] ?>&tbl=invoice'">
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['invoice_no'] ?></td>
                                        <td><?= $row['date'] ?></td>
                                        <td><?= $row['customer'] ?></td>
                                        <td><?= $row['address'] ?></td>
                                        <td><?= $row['total'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                <?php }
                    } ?>


            </div>

        </fieldset>
    </div>

    <link rel="stylesheet" href="/tables/css/dataTables.bootstrap4.css">
    <!-- JQuery DataTable Scripts -->
    <script src="/tables/js/jquery.dataTables.js"></script>
    <script src="/tables/js/dataTables.bootstrap4.js"></script>

    <script>
        $(".table").DataTable();
    </script>
<?php } ?>