<?php
require_once("init.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html>

<head>
  <title>ITTJWIMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="/favicon.png">
  <link href="/style.css" rel="stylesheet">
  <link rel="stylesheet" href="/js/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <link href="/fontawesome-free-5.10.0-web/css/fontawesome.css" rel="stylesheet">
  <link href="/fontawesome-free-5.10.0-web/css/brands.css" rel="stylesheet">
  <link href="/fontawesome-free-5.10.0-web/css/solid.css" rel="stylesheet">
  <script src="/js/jquery.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
  <script src="/js/script.js"></script>
  <script type="text/javascript" src="/js/numberToWords.min.js"></script>

</head>

<body>

  <nav id="header" class="navbar navbar-expand-md bg-dark navbar-dark">

    <!-- Brand/logo -->
    <a class="navbar-brand" href="/index.php"><span><?= $dbname ?></span></a>

    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div id="navcol-1" class="collapse navbar-collapse">

      <!-- Links -->
      <ul class="navbar-nav">
        <?php
        if (!isset($name) || empty($name)) {
          ?>
          <li id="login" class="nav-item">
            <a id="signin" class="nav-link" href="#" onclick="return load_login()">Register</a>
          </li>
        <?php
        } else {
          ?>
          <li class="nav-item">
            <a class="nav-link" id="inv" href="#" onclick="return load_invoice()">Invoice</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="return load_waybill()">Waybill</a>
          </li>
        <?php } ?>

      </ul>
      <?php
      if (!empty($name)) {

        ?>
        <p class="ml-auto navbar-text action">
          <div class="dropdown">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user-tie"></i> <?php echo $name; ?>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/admin/profile" onclick="return load_profile()"><i class="fas fa-user-circle"></i> Profile</a>
              <a class="dropdown-item" href="/admin/record" onclick="return load_record()"><i class="fas fa-folder-open"></i> Records</a>
              <a class="dropdown-item" href="/admin/settings" onclick="return load_settings()"><i class="fas fa-cog"></i> Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../scripts/sign_out.php"><i class="fas fa-power-off"></i> Log Out</a>
            </div>
          </div>
        </p>
      <?php
      }
      ?>

    </div>



  </nav>