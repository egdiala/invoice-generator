<?php
require_once("../scripts/session_auth.php");
if (!$name) header("Refresh: 5; URL=/");
include("../scripts/header.php");
?>
<p></p>

<?php
if (empty($name)) {
  echo "<h2>YOU NEED TO LOGIN!</h2>";
} else {
  ?>
  <div id="cont1">
    <style>
      .avatar {
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50%;
      }
    </style>
    <img src="/admin/avatar.png" alt="Avatar" class="avatar mx-auto d-block">
    <p>
      <?php
        require_once("../scripts/init.php");
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = $conn->query("SELECT name, email, phone_number, username FROM admin WHERE id = {$_SESSION['id']}");
        if ($sql->num_rows > 0) {
          // output data of each row
          while ($row = $sql->fetch_assoc()) {
            echo "<center>Name: " . $row["name"] . "</center>";
            echo "<center>Email: " . $row["email"] . "</center>";
            echo "<center>Phone Number: " . $row["phone_number"] . "</center>";
            echo "<center>Username: " . $row["username"] . "</center>";
          }
        } else {
          echo "0 results";
        }
        ?>
    </p>
  </div>
<?php
}
?>
</body>

</html>