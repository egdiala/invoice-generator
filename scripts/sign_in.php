<?php
require_once("init.php");





// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die('Could not connect to the database.');
}



//if button is clicked
if (isset($_POST['login'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['pswd']);
    $salt = "kdf84kh38" . $password . "khjsfiw97r924j";
    $newpsw = password_hash($salt, PASSWORD_DEFAULT);
    //check if inputs have been filled
    if (!empty($uname) && !empty($password)) {


        //query to check if email and password match with what's in the database
        $sql = "SELECT password FROM admin WHERE username='$uname' ";
        $result = $conn->query($sql);

        //if num rows is greater than 0, then user exist
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                unset($hash_pass);
                $hash_pass = $row['password'];
            }
            if (password_verify($salt, $hash_pass)) {

                echo '<script>alert("Login Successful!"); </script>';

                $reply = $conn->query("SELECT id,name FROM admin WHERE username='$uname'");


                while ($row = $reply->fetch_assoc()) {
                    unset($name, $id);
                    $id = $row['id'];
                    $name = $row['name'];
                    $fullname = explode(' ', $name);
                    $fname = end($fullname);
                }

                SESSION_START();
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $fname;
                $_SESSION['uname'] = $uname;


                //redirect to the dashboard page using php built-in header method
                header("Location: ../admin/dashboard.php");
            } else {
                echo '<script>alert("Invalid Username/Password combination"); </script>';
                header("Refresh: 0.01; URL=/");
            }
        } else {
            echo '<script>alert("Please, fill out all fields!"); </script>';
            header("Refresh: 0.01; URL=/");
        }
    }
}
