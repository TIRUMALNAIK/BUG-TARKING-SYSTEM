
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'manager-header.php';

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    else if(isset($_POST['submit'])) {
        $programmer = $_POST['programmer'];
        $tester = $_POST['tester'];
        $project = $_POST['project'];
        $module = $_POST['module'];
        $date = $_POST['date'];
        $description = $_POST['description'];

        if(mysqli_query($conn, "insert into assign(programmer_id, tester_id, project_id, module_id, dead_date, description, status)values('$programmer', '$tester', '$project', '$module', '$date', '$description', true)")) {
            echo "<script>alert('Task added successfully..!');</script>";
        }
        else {
            echo "<script>alert('Oops, Unable to add task..!');</script>";
        }                   
    }
?>
<div class="w3l-index1">

<section class="w3l-index3 py-3">
    <div class="container py-lg-3 mt-3">
        <h3 class="mb-3">Add Task</h2>
        <div class="row align-items-center">
            <div class="col-lg-6 book-info pr-lg-5">
                <form method="post" action="#">
                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Select Programmer:</label>
                        <select class="form-control" aria-label="Default select example" required name="programmer">
                            <?php
                                $res2 = mysqli_query($conn, "select id, name from employee where type = 'Programmer'");
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
                                    <option value="">No employee found</option>
                                <?php
                            }?>
                        </select>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Select Tester:</label>
                        <select class="form-control" aria-label="Default select example" required name="tester">
                            <?php
                                $res2 = mysqli_query($conn, "select id, name from employee where type = 'Tester'");
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
                                    <option value="">No employee found</option>
                                <?php
                            }?>
                        </select>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Select Project:</label>
                        <select class="form-control" aria-label="Default select example" required name="project">
                            <?php
                                $res2 = mysqli_query($conn, "select id, project_code from project");
                                if(mysqli_num_rows($res2)>0) {
                                    echo "<option value=''>Choose..</option>";
                                    while($row2 = mysqli_fetch_assoc($res2)) {
                                        ?>
                                        <option value="<?php echo $row2['id'];?>"><?php echo $row2['project_code']; ?></option>
                                    <?php
                                    }
                                }
                                else {
                                    ?>
                                    <option value="">No project found</option>
                                <?php
                            }?>
                        </select>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Select Module:</label>
                        <select class="form-control" aria-label="Default select example" required name="module">
                            <?php
                                $res2 = mysqli_query($conn, "select id, name from module");
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
                                    <option value="">No module found</option>
                                <?php
                            }?>
                        </select>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Dead Date:</label>
                        <input type="date"  class="form-control input-style" name="date" id="validationDefault01" required>
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
        <img src="assets/images/assign.jpg" class="img-fluid shadow img-curve" alt="" />
      </div>
    </div>
  </div>
</section>
</div>
<?php
    include 'footer.php';
?>