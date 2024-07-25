
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
        $company = $_POST['company'];
        $description = $_POST['description'];

        if(mysqli_query($conn, "insert into department(name, company_id, description, status)values('$name', '$company', '$description', true)")) {
            echo "<script>alert('Department added successfully..!');</script>";
        }
        else {
            echo "<script>alert('Oops, Unable to add department..!');</script>";
        }                   
    }
?>
<div class="w3l-index1">

<section class="w3l-index3 py-3">
    <div class="container py-lg-3 mt-3">
        <h3 class="mb-3">Add Department</h2>
        <div class="row align-items-center">
            <div class="col-lg-6 book-info pr-lg-5">
                <form method="post" action="#">
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
                        <label for="validationDefault02" class="input__label">Department Name:</label>
                        <input type="text"  class="form-control input-style" name="name" id="validationDefault01" required>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Description:</label>
                        <textarea class="form-control input-style" name="description" id="validationDefault02" required></textarea>
                    </div>

              <div class="col-12">
                <button class="btn btn-primary mt-4" type="submit" name="submit">Submit form</button>
              </div>
              </form>
      </div>
      <div class="col-lg-6 pl-lg-5 mt-lg-0 mt-5">
        <img src="assets/images/department.jpg" class="img-fluid shadow img-curve" alt="" />
      </div>
    </div>
  </div>
</section>
</div>
<?php
    include 'footer.php';
?>