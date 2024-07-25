
<?php
    session_start();
    include 'config.php';
    if(!isset($_SESSION['login']))
    {
      header ("Location: signin.php");
    }
  
    include 'link.php';
    if($_SESSION['type']=="Admin") {
      include 'admin-header.php';
    }
    else if($_SESSION['type']=="Manager") {
      include 'manager-header.php';
    }
    else if($_SESSION['type']=="Programmer") {
      include 'programmer-header.php';
    }
    else if($_SESSION['type']=="Tester") {
      include 'tester-header.php';
    }
    
?>
<div class="w3l-index1">

<section class="w3l-index3 py-3">
  <div class="container py-lg-3 mt-3">
    <div class="row align-items-center">
      <div class="col-lg-6 book-info pr-lg-5">
        <h6 class="sub-title">About Our Bug Tracking</h6>
        <h3 class="mb-md-4 mb-3">The Best Choice For Your Successful Business!</h3>
        <p class="mb-md-5 mb-4">BTS is an error detecting system for knowing the ability of the Programmers who
codes the program .Each programmer will have an account where details are
maintained .There are two phases in a software company programming phase and
testing phase. Programming phase does the work of coding the program .Testing
phase does the work of testing the errors in the program written by a programmer
.Once the programmer writes the code it is sent to the testing phase in 3 builds.</p>
      </div>
      <div class="col-lg-6 pl-lg-5 mt-lg-0 mt-5">
        <img src="assets/images/bug.jpg" class="img-fluid shadow img-curve" alt="" />
      </div>
    </div>
  </div>
</section>
</div>
<?php
    include 'footer.php';
?>