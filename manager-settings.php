
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'manager-header.php';

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    else if(isset($_POST['change'])) {
        $cpass = $_POST['cpassword'];
        $npass = $_POST['npassword'];
        $opass = $_POST['opassword'];

        if($cpass == $npass) {
            $user = $_SESSION['username'];

            $res1 = mysqli_query($conn, "select password from login where username='$user'");
            if(mysqli_num_rows($res1)>0) {
                $row1 = mysqli_fetch_assoc($res1);
                $oldpass = $row1['password'];
                if($opass == $oldpass) {
                    if(mysqli_query($conn, "update login set password = '$npass' where username='$user' ")) {
                        echo "<script>alert('Password updated successfully..!');</script>";
                    }
                    else {
                        echo "<script>alert('Oops, Unable to update your password..!');</script>";
                    }
                }
                else {
                    echo "<script>alert('Invalid current password..!');</script>";
                }
            }
            else {
                echo "<script>alert('Oops, Unable to update your password..!');</script>";
            }
        }
        else {
            echo "<script>alert('Passwords dont match..!');</script>";
        }                    
    }
?>
<div class="w3l-index1">

<section class="w3l-index3 py-3">
    <div class="container py-lg-3 mt-3">
        <h3 class="mb-3">Update Manager Password</h2>
        <div class="row align-items-center">
            <div class="col-lg-6 book-info pr-lg-5">
                <form method="post" action="#">
                <div class="col-md-9 mt-3">
                    <label for="validationDefault01" class="form-label">Current Password</label>
                    <input type="password" name="opassword" class="form-control input-style" id="inputPassword3"
                                placeholder="Current Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>

                <div class="form-group col-md-9 mt-3">
                    <label for="validationDefault02" class="input__label">New Password</label>
                    <input type="password" name="npassword" class="form-control input-style" id="inputPassword3"
                                placeholder="New Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>

                <div class="form-group col-md-9 mt-3">
                    <label for="validationDefault02" class="input__label">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control input-style" id="inputPassword3"
                                placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>

              <div class="col-12">
                <button class="btn btn-primary mt-4" type="submit" name="change">Submit form</button>
              </div>
              </form>
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