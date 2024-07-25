
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'admin-header.php';

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    else if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $branch = $_POST['branch'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        if(mysqli_query($conn, "insert into company(name, branch, email, contact, address, status)values('$name', '$branch', '$email', '$contact', '$address', true)")) {
            echo "<script>alert('Company added successfully..!');</script>";
        }
        else {
            echo "<script>alert('Oops, Unable to add company..!');</script>";
        }                   
    }
?>
<div class="w3l-index1">

<section class="w3l-index3 py-3">
    <div class="container py-lg-3 mt-3">
        <h3 class="mb-3">Add Company</h2>
        <div class="row align-items-center">
            <div class="col-lg-6 book-info pr-lg-5">
                <form method="post" action="#">
                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Company Name:</label>
                        <input type="text"  class="form-control input-style" name="name" id="validationDefault01" required>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Company Branch:</label>
                        <input type="text" class="form-control input-style" name="branch" id="validationDefault01" required>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Email Address:</label>
                        <input type="email" class="form-control icon" name="email" style="padding-left:18px" required>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Contact Number:</label>
                        <input type="text" title="Please enter 10 digit valid number" pattern="[6789][0-9]{9}" class="form-control icon" name="contact" style="padding-left:18px" required>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Address:</label>
                        <textarea class="form-control input-style" name="address" id="validationDefault02" required></textarea>
                    </div>

              <div class="col-12">
                <button class="btn btn-primary mt-4" type="submit" name="submit">Submit form</button>
              </div>
              </form>
      </div>
      <div class="col-lg-6 pl-lg-5 mt-lg-0 mt-5">
        <img src="assets/images/company.jpg" class="img-fluid shadow img-curve" alt="" />
      </div>
    </div>
  </div>
</section>
</div>
<?php
    include 'footer.php';
?>