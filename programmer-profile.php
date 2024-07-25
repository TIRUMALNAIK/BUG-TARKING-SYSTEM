
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'programmer-header.php';

    $username = $_SESSION['username'];

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    else if(isset($_POST['update'])) {
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $num = $_POST['contact'];
        
        if(!empty($_FILES['image']['name'])) {
            $image = "user/".$_FILES["image"]["name"];
            if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$_FILES["image"]["name"])) {
                if(mysqli_query($conn, "update employee set name = '$fname', email = '$email', contact = '$num', image = '$image' where username = '$username'")) {     
                    echo "<script>alert('Profile updated successfully..!');location.href='programmer-profile.php'</script>";
                }
                else {
                    echo "<script>alert('Opps, Unable to update profile..!');</script>";
                }
            }
            else {
                echo "<script>alert('Opps, Unable to upload your image on server..!');</script>";
            }
        }
        else {
            if(mysqli_query($conn, "update employee set name = '$fname', email = '$email', contact = '$num' where username = '$username'")) {     
                echo "<script>alert('Profile updated successfully..!');location.href='programmer-profile.php'</script>";
            }
            else {
                echo "<script>alert('Opps, Unable to update profile..!');</script>";
            }
        }
    }
?>
<div class="w3l-index1">

<section class="w3l-index3 py-3">
    <div class="container py-lg-3 mt-3">
        <h3 class="mb-3">Update Programmer Profile</h2>
        <div class="row align-items-center">
            <div class="col-lg-6 book-info pr-lg-5">
                <form method="post" action="#" enctype="multipart/form-data">
                <div class="col-md-9 mt-3">
                    <label for="validationDefault01" class="form-label">Full name</label>
                    <input type="text" class="form-control input-style" name="fname" id="validationDefault01" value="<?php echo $row['name'];?>" required>
                </div>

                <div class="form-group col-md-9 mt-3">
                    <label for="validationDefault02" class="input__label">User name</label>
                    <input type="text" class="form-control input-style" name="uname" id="validationDefault02" value="<?php echo $row['username'];?>" required disabled>
                </div>

                <div class="form-group col-md-9 mt-3">
                    <label for="validationDefault02" class="input__label">Email</label>
                    <input type="email" class="form-control input-style" name="email" id="validationDefault02" value="<?php echo $row['email'];?>" required>
                </div>

              <div class="form-group col-md-9 mt-3">
                <label for="validationDefault02" class="input__label">Contact Number</label>
                <input type="text" title="Please enter 10 digit valid number" name="contact" pattern="[6789][0-9]{9}" class="form-control input-style" id="validationDefault02" value="<?php echo $row['contact'];?>" required>
              </div>

              <div class="form-group col-md-9 mt-3">
                <label for="validationDefault02" class="input__label">Profile Image</label>
                <input type="file" class="form-control input-style" id="validatedCustomFile" name="image" accept="image/*">
              </div>

              <div class="col-12">
                <button class="btn btn-primary mt-4" type="submit" name="update">Submit form</button>
              </div>
            </form>
      </div>
      <div class="col-lg-6 pl-lg-5 mt-lg-0 mt-5">
        <img src="assets/images/profile.jpg" class="img-fluid shadow img-curve" alt="" />
      </div>
    </div>
  </div>
</section>
</div>
<?php
    include 'footer.php';
?>
