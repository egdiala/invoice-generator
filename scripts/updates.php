<?php
require_once("init.php");
require_once("../scripts/session_auth.php");
if (!$name) header("Refresh: 5; URL=/");
include("../scripts/header.php");


$conn = mysqli_connect($servername, $username, $password, $dbname);

$org = $_POST['neworg'];
$mail = $_POST['newmail'];
$phone = $_POST['newphone'];
$uname = $_POST['newuname'];
$pword = $_POST['newpword'];

if (empty($org) && empty($mail) && empty($phone) && empty($uname) && empty($pword)) {
    $msg = "";
    ?>
    <div id="demo" style="text-align: center; margin-top: 0px;">
        Nothing to update. Returning in...
    </div>
    <p id="countdown" style="text-align: center; font-size: 60px; margin-top: 0px;"></p>
    <script>
        var timeleft = 5;
        var downloadTimer = setInterval(function() {
            document.getElementById("countdown").innerHTML = timeleft + " seconds";
            timeleft -= 1;
            if (timeleft < 0) {
                clearInterval(downloadTimer);
                x = document.getElementById("demo");
                x.style.display = "none";
                document.getElementById("countdown").innerHTML = "Returning..."
            }
        }, 750);
    </script>
<?php
    header("Refresh: 5; URL=/admin/settings.php");
} elseif (!empty($org)) {
    $sql = "UPDATE admin SET company='$org' WHERE id='{$_SESSION['id']}'";
    mysqli_query($conn, $sql);
    $msg = "Saved Successfully.";
} elseif (!empty($mail)) {
    $sql = "UPDATE admin SET email='$mail' WHERE id='{$_SESSION['id']}'";
    mysqli_query($conn, $sql);
    $msg = "Saved Successfully.";
} elseif (!empty($phone)) {
    $sql = "UPDATE admin SET phone_number='$phone' WHERE id='{$_SESSION['id']}'";
    mysqli_query($conn, $sql);
    $msg = "Saved Successfully.";
} elseif (!empty($uname)) {
    $sql = "UPDATE admin SET username='$uname' WHERE id='{$_SESSION['id']}'";
    mysqli_query($conn, $sql);
    $msg = "Saved Successfully.";
} elseif (!empty($pword)) {
    $salt = "kdf84kh38" . $pword . "khjsfiw97r924j";
    $newpsw = password_hash($salt, PASSWORD_DEFAULT);
    $sql = "UPDATE admin SET password='$newpsw' WHERE id='{$_SESSION['id']}'";
    mysqli_query($conn, $sql);
    $msg = "Saved Successfully.";
}


echo '<div id="demo" style="text-align: center; margin-top: 0px;">' . $msg . '</div>';
header("Refresh: 5; URL=/admin/settings.php");
?>