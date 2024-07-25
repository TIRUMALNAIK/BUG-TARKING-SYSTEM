
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'manager-header.php';

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    else if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $platform = $_POST['platform'];
        $type = $_POST['type'];
        $code = "PROJ".rand(10000, 99999);

        if(mysqli_query($conn, "insert into project(project_code, project_name, platform, type, status)values('$code', '$name', '$platform', '$type', true)")) {
            echo "<script>alert('Project added successfully..!');</script>";
        }
        else {
            echo "<script>alert('Oops, Unable to add project..!');</script>";
        }                   
    }
?>
<div class="w3l-index1">

<section class="w3l-index3 py-3">
    <div class="container py-lg-3 mt-3">
        <h3 class="mb-3">Add Project</h2>
        <div class="row align-items-center">
            <div class="col-lg-6 book-info pr-lg-5">
                <form method="post" action="#">
                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Project Name:</label>
                        <input type="text"  class="form-control input-style" name="name" id="validationDefault01" required>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Project Platform:</label>
                        <input type="text"  class="form-control input-style" name="platform" id="validationDefault01" required>
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="validationDefault02" class="input__label">Project Type:</label>
                        <input type="text"  class="form-control input-style" name="type" id="validationDefault01" required>
                    </div>

              <div class="col-12">
                <button class="btn btn-primary mt-4" type="submit" name="submit">Submit form</button>
              </div>
              </form>
      </div>
      <div class="col-lg-6 pl-lg-5 mt-lg-0 mt-5">
        <img src="assets/images/project.jpg" class="img-fluid shadow img-curve" alt="" />
      </div>
    </div>
  </div>
</section>
</div>
<?php
    include 'footer.php';
?>