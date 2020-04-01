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
        <fieldset class="scheduler-border">
            <div class="container">
                <div class="col-12">
                    <div class="col-12"><b>SETTINGS</b></div>
                    <center>COMING SOON!</center>
                    <form action="../scripts/updates.php" method="POST">
                        <div class="col-3" style="margin-top: 5px;">
                            <b>Update Company Name</b><br />
                            <input class="form-control" type="text" name="neworg" style="margin-top: 5px;">
                        </div>

                        <div class="col-3" style="margin-top: 5px;">
                            <b>Update Email</b><br />
                            <input class="form-control" type="text" name="newmail" style="margin-top: 5px;">
                        </div>

                        <div class="col-3" style="margin-top: 5px;">
                            <b>Update Phone</b><br />
                            <input class="form-control" type="text" name="newphone" style="margin-top: 5px;">
                        </div>

                        <div class="col-3" style="margin-top: 5px;">
                            <b>Update Username</b><br />
                            <input class="form-control" type="text" name="newuname" style="margin-top: 5px;">
                        </div>

                        <div class="col-3" style="margin-top: 5px;">
                            <b>Update Password</b><br />
                            <div class="input-group psw" style="margin-top: 5px;">
                                <input id="pswd" class="form-control" type="password" name="newpword">
                                <div class="input-group-prepend">
                                    <button type="button" class="view" onclick="passview()">
                                        <i id="eye" class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-3" style="margin-top: 5px;">
                            <button type="submit" class="btn btn-primary" name="update" style="float: left">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </fieldset>
    </div>
<?php
}
?>