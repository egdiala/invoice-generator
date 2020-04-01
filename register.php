<div id="cont1" class="container">
  <h2>Register</h2>
  <p></p>
  <form action="scripts/sign_up.php" method="POST" onsubmit="return validateForm()">
    <div class="form-group">
      <label for="uname">First Name:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter firstname" name="fname" required>
      <!-- <div class="valid-feedback">Valid.</div> -->
      <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
    </div>
    <div class="form-group">
      <label for="uname">Last Name:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter lastname" name="lname" required>
      <!-- <div class="valid-feedback">Valid.</div> -->
      <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
    </div>
    <div class="form-group">
      <label for="uname">Email:</label>
      <input type="text" class="form-control" id="uname" placeholder="example@email.com" name="email" required>
      <!-- <div class="valid-feedback">Valid.</div> -->
      <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
    </div>
    <div class="form-group">
      <label for="uname">Phone Number:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter phone number" name="phone" required>
      <!-- <div class="valid-feedback">Valid.</div> -->
      <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
    </div>
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
      <!-- <div class="valid-feedback">Valid.</div> -->
      <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
      <!-- <div class="valid-feedback">Valid.</div> -->
      <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
        <!-- <div class="valid-feedback">Valid.</div> -->
        <!-- <div class="invalid-feedback">Check this checkbox to continue.</div> -->
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>