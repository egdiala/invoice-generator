<?php

require_once("init.php");




try {
    $conn = new
        PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // set the PDO error mode to exception

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Insert Data into MySQL
    $name = $_POST['name'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    //$csign = $_POST['csign'];
    //$isign = $_POST['isign'];
    $qty = $_POST['qty'];
    $dsc = $_POST['dsc'];
    $rate = $_POST['rate'];
    $amt = $_POST['amt'];
    $words = $_POST['words'];

    $runSql = $conn->query("SELECT id FROM invoice ORDER BY id DESC LIMIT 1");
    $result = $runSql->fetchColumn();


    if ($result > 0) {
        // output data of each row
        $dbValue = $result + 1;
        $invID = "INV-" . str_pad($dbValue, 8, '0', STR_PAD_LEFT);

        //input data into table
        $stmt = $conn->prepare("INSERT INTO invoice (invoice_no, date, customer, address, total, total_in_words) VALUES (:invID, :date, :name, :address, :amount, :words)");
        $stmt->bindParam(':invID', $invID);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':words', $words);

        //Execute Query
        $query = $stmt->execute();

        for ($i = 0; $i < count($dsc); $i++) {
            $quantity = (!empty($qty[$i])) ? $qty[$i] : '';
            $description = (!empty($dsc[$i])) ? $dsc[$i] : '';
            $rates = (!empty($rate[$i])) ? $rate[$i] : '';
            $amts = (!empty($amt[$i])) ? $amt[$i] : '';

            $sql = $conn->prepare("INSERT INTO invoice_details (invoice_no, qty, description, rate, amount) VALUES (:invID, :qty, :dsc, :rate, :amt)");
            $sql->bindParam(':invID', $invID);
            $sql->bindParam(':qty', $quantity);
            $sql->bindParam(':dsc', $description);
            $sql->bindParam(':rate', $rates);
            $sql->bindParam(':amt', $amts);

            $query1 = $sql->execute();
        }
    } else {
        $value = 1;
        $invID1 = "INV-" . str_pad($value, 8, '0', STR_PAD_LEFT);

        //input data into table
        $stmt1 = $conn->prepare("INSERT INTO invoice (invoice_no, date, customer, address, total, total_in_words) VALUES (:invID1, :date, :name, :address, :amount, :words)");
        $stmt1->bindParam(':invID1', $invID1);
        $stmt1->bindParam(':date', $date);
        $stmt1->bindParam(':name', $name);
        $stmt1->bindParam(':address', $address);
        $stmt1->bindParam(':amount', $amount);
        $stmt1->bindParam(':words', $words);

        //Execute Query
        $query2 = $stmt1->execute();

        for ($i = 0; $i < count($dsc); $i++) {
            $quantity = (!empty($qty[$i])) ? $qty[$i] : '';
            $description = (!empty($dsc[$i])) ? $dsc[$i] : '';
            $rates = (!empty($rate[$i])) ? $rate[$i] : '';
            $amts = (!empty($amt[$i])) ? $amt[$i] : '';

            $sql1 = $conn->prepare("INSERT INTO invoice_details (invoice_no, qty, description, rate, amount) VALUES (:invID1, :qty, :dsc, :rate, :amt)");
            $sql1->bindParam(':invID1', $invID1);
            $sql1->bindParam(':qty', $quantity);
            $sql1->bindParam(':dsc', $description);
            $sql1->bindParam(':rate', $rates);
            $sql1->bindParam(':amt', $amts);

            $query3 = $sql1->execute();
        }
    }


    header("Location: createpdf.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
