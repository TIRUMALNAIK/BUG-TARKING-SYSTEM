
<?php
    session_start();
    include 'link.php';
    include 'header.php';
?>
<div class="w3l-index1">

<section class="w3l-index3 py-3">
    <div class="container py-lg-3 mt-3">
        <h3 class="mb-3">Update Password</h2>
        <div class="row align-items-center">
            <div class="col-lg-6 book-info pr-lg-5">
        
                <div class="col-md-9 mt-3">
                    <label for="validationDefault01" class="form-label">Current Password</label>
                    <input type="password" name="opass" class="form-control input-style" id="inputPassword3"
                                placeholder="Current Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>

                <div class="form-group col-md-9 mt-3">
                    <label for="validationDefault02" class="input__label">New Password</label>
                    <input type="password" name="npass" class="form-control input-style" id="inputPassword3"
                                placeholder="New Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>

                <div class="form-group col-md-9 mt-3">
                    <label for="validationDefault02" class="input__label">Confirm Password</label>
                    <input type="password" name="cpass" class="form-control input-style" id="inputPassword3"
                                placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>

              <div class="col-12">
                <button class="btn btn-primary mt-4" type="submit" name="updateadm">Submit form</button>
              </div>
      </div>
      <div class="col-lg-6 pl-lg-5 mt-lg-0 mt-5">
        <img src="assets/images/setting.jpg" class="img-fluid shadow img-curve" alt="" />
      </div>
    </div>
  </div>
</section>
</div>
<?php
    include 'footer.php';
?>