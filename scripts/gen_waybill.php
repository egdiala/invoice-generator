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
    $dname = $_POST['dname'];
    $date = $_POST['date'];
    $vnum = $_POST['vnum'];
    //$csign = $_POST['csign'];
    //$isign = $_POST['isign'];
    $dsc = $_POST['dsc'];
    $qty = $_POST['qty'];
    $rem = $_POST['rem'];
    $amt = $_POST['total'];
    $words = $_POST['words'];

    $runSql = $conn->query("SELECT id FROM waybill ORDER BY id DESC LIMIT 1");
    $result = $runSql->fetchColumn();


    if ($result > 0) {
        // output data of each row
        $dbValue = $result + 1;
        $wblID = "WBL-" . str_pad($dbValue, 8, '0', STR_PAD_LEFT);

        //input data into table
        $stmt = $conn->prepare("INSERT INTO waybill (waybill_no, date, customer, address, driver, vehicle, total, total_in_words) VALUES (:wblID, :date, :name, :address, :dname, :vnum, :total, :words)");
        $stmt->bindParam(':wblID', $wblID);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':dname', $dname);
        $stmt->bindParam(':vnum', $vnum);
        $stmt->bindParam(':total', $amt);
        $stmt->bindParam(':words', $words);

        //Execute Query
        $query = $stmt->execute();

        for ($i = 0; $i < count($dsc); $i++) {
            $description = (!empty($dsc[$i])) ? $dsc[$i] : '';
            $quantity = (!empty($qty[$i])) ? $qty[$i] : '';
            $remark = (!empty($rem[$i])) ? $rem[$i] : '';

            $sql = $conn->prepare("INSERT INTO waybill_details (waybill_no, description, qty, remark, total) VALUES (:wblID, :dsc, :qty, :rem, :total)");
            $sql->bindParam(':wblID', $wblID);
            $sql->bindParam(':dsc', $description);
            $sql->bindParam(':qty', $quantity);
            $sql->bindParam(':rem', $remark);
            $sql->bindParam(':total', $amt);

            $query1 = $sql->execute();
        }
    } else {
        $value = 1;
        $wblID1 = "WBL-" . str_pad($value, 8, '0', STR_PAD_LEFT);

        //input data into table
        $stmt1 = $conn->prepare("INSERT INTO waybill (waybill_no, date, customer, address, driver, vehicle, total, total_in_words) VALUES (:wblID1, :date, :name, :address, :dname, :vnum, :total, :words)");
        $stmt1->bindParam(':wblID1', $wblID1);
        $stmt1->bindParam(':date', $date);
        $stmt1->bindParam(':name', $name);
        $stmt1->bindParam(':address', $address);
        $stmt1->bindParam(':dname', $dname);
        $stmt1->bindParam(':vnum', $vnum);
        $stmt1->bindParam(':total', $amt);
        $stmt1->bindParam(':words', $words);

        //Execute Query
        $query2 = $stmt1->execute();

        for ($i = 0; $i < count($dsc); $i++) {
            $quantity = (!empty($qty[$i])) ? $qty[$i] : '';
            $description = (!empty($dsc[$i])) ? $dsc[$i] : '';
            $rates = (!empty($rate[$i])) ? $rate[$i] : '';
            $amts = (!empty($amt[$i])) ? $amt[$i] : '';

            $sql1 = $conn->prepare("INSERT INTO waybill_details (waybill_no, description, qty, remark, total) VALUES (:wblID1, :dsc, :qty, :rem, :total)");
            $sql1->bindParam(':wblID1', $wblID1);
            $sql1->bindParam(':dsc', $description);
            $sql1->bindParam(':qty', $quantity);
            $sql1->bindParam(':rem', $remark);
            $sql1->bindParam(':total', $amt);

            $query3 = $sql1->execute();
        }
    }


    header("Location: makepdf.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
