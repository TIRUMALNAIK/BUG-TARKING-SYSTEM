
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'programmer-header.php';

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    else if(isset($_POST['submit'])) {
        
        $image = "program/".$_FILES["image"]["name"];
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"program/".$_FILES["image"]["name"])) {
            if(mysqli_query($conn, "update assign set program_file='$image' where id = '$_GET[id]'")) { 
                echo "<script>alert('Task submitted successfully..!');location.href='build.php';</script>";
            }
            else {
                echo "<script>alert('Opps, Unable to submit task..!');</script>";
            }
        }
        else {
            echo "<script>alert('Opps, Unable to upload your file on server..!');</script>";
        }
    }
?>
<div class="w3l-index1">

<section class="w3l-index3 py-3">
    <div class="container py-lg-3 mt-3">
        <div class="row align-items-center">
            <div class="col-lg-6 book-info pr-lg-5">
            
            <h3 class="mb-3">Add Your Program</h2>
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="form-group col-md-12 mt-4">
                    <label for="validationDefault02" class="input__label">Build File</label>
                    <input type="file" class="form-control input-style" id="validatedCustomFile" name="image" required>
                </div>

              <div class="col-12">
                <button class="btn btn-primary mt-4" type="submit" name="submit">Submit form</button>
              </div>
              </form>
      </div>
      <div class="col-lg-6 pl-lg-5 mt-lg-0 mt-5">
        <img src="assets/images/build.jpg" class="img-fluid shadow img-curve" alt="" />
      </div>
    </div>
  </div>
</section>
</div>
<?php
    include 'footer.php';
?>