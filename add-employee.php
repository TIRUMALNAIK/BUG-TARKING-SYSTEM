
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'admin-header.php';

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    else if(isset($_POST['submit'])) {
        $company = $_POST['company'];
        $department = $_POST['department'];
        $uname = $_POST['username'];
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $password = "PSs".rand(10000, 99999)."@#";
        
        $image = "user/".$_FILES["image"]["name"];
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$_FILES["image"]["name"])) {
            if(mysqli_query($conn, "insert into employee (company_id, department_id, name, username, contact, email, status, image, type)values('$company', '$department', '$name', '$uname', '$contact', '$email', true, '$image', '$designation')")) { 
                if(mysqli_query($conn, "insert into login(username, password, type, status)values('$uname', '$password', '$designation', true)")) {     
                    echo "<script>alert('Employee added successfully..!');location.href='add-employee.php'</script>";
                }
                else {
                    echo "<script>alert('Opps, Unable to add employee..!');</script>";
                }
            }
            else {
                echo "<script>alert('Opps, Unable to add employee..!');</script>";
            }
        }
        else {
            echo "<script>alert('Opps, Unable to upload your image on server..!');</script>";
        }
    }
?>
<div class="w3l-index1">

<section class="w3l-index3 py-3">
    <div class="container py-lg-3 mt-3">
        <h3 class="mb-3">Add Employee</h2>
        <div class="row align-items-center">
            <div class="col-lg-6 book-info pr-lg-5">
            <form method="post" action="#" enctype="multipart/form-data">
                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Select Company:</label>
                        <select class="form-control" aria-label="Default select example" required name="company">
                            <?php
                                $res2 = mysqli_query($conn, "select id, name from company");
                                if(mysqli_num_rows($res2)>0) {
                                    echo "<option value=''>Choose..</option>";
                                    while($row2 = mysqli_fetch_assoc($res2)) {
                                        ?>
                                        <option value="<?php echo $row2['id'];?>"><?php echo $row2['name']; ?></option>
                                    <?php
                                    }
                                }
                                else {
                                    ?>
                                    <option value="">No company found</option>
                                <?php
                            }?>
                        </select>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Select Department:</label>
                        <select class="form-control" aria-label="Default select example" required name="department">
                            <?php
                                $res2 = mysqli_query($conn, "select id, name from department");
                                if(mysqli_num_rows($res2)>0) {
                                    echo "<option value=''>Choose..</option>";
                                    while($row2 = mysqli_fetch_assoc($res2)) {
                                        ?>
                                        <option value="<?php echo $row2['id'];?>"><?php echo $row2['name']; ?></option>
                                    <?php
                                    }
                                }
                                else {
                                    ?>
                                    <option value="">No department found</option>
                                <?php
                            }?>
                        </select>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Employee Name:</label>
                        <input type="text"  class="form-control input-style" name="name" id="validationDefault01" required>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">User Name:</label>
                        <input type="text"  class="form-control input-style" name="username" id="validationDefault01" required>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Contact Number:</label>
                        <input type="text" title="Please enter 10 digit valid number" pattern="[6789][0-9]{9}" class="form-control icon" name="contact" style="padding-left:18px" required>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Email Address:</label>
                        <input type="email" class="form-control icon" name="email" style="padding-left:18px" required>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Profile Image</label>
                        <input type="file" class="form-control input-style" id="validatedCustomFile" name="image" accept="image/*" required>
                    </div>
                    
                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Select Designation:</label>
                        <select class="form-control" aria-label="Default select example" required name="designation">
                            <option value="">Choose..</option>
                            <option value="Manager">Manager</option>
                            <option value="Programmer">Programmer</option>
                            <option value="Tester">Tester</option>
                        </select>
                    </div>

              <div class="col-12">
                <button class="btn btn-primary mt-4" type="submit" name="submit">Submit form</button>
              </div>
              </form>
      </div>
      <div class="col-lg-6 pl-lg-5 mt-lg-0 mt-5">
        <img src="assets/images/employee.jpg" class="img-fluid shadow img-curve" alt="" />
      </div>
    </div>
  </div>
</section>
</div>
<?php
    include 'footer.php';
?>