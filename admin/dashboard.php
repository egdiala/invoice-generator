<?php
require_once("../scripts/session_auth.php");
if (!$name) header("Refresh: 5; URL=/");
include("../scripts/header.php");
?>
<p></p>
<div id="cont1"></div>
<?php
if (empty($name)) {
  echo "<h2>YOU NEED TO LOGIN!</h2>";
}
?>

</body>

</html>