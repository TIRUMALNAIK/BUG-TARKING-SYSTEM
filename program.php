
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'programmer-header.php';

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    
?>
<!-- index-block1 -->
<div class="w3l-index1">

<section class="w3l-index3 py-3">
<div class="container mt-3">
  <div class="header-section mb-5 text-center">
        <h3>Your Programs</h3>
      </div>
      <div class="row align-items-center">
    <?php 
        $res1 = mysqli_query($conn, "select assign.id, project.project_code, module.name as mname, assign.dead_date, assign.date, assign.test_file, assign.program_file from assign join employee on employee.id = assign.programmer_id join module on module.id = assign.module_id join project on project.id = assign.project_id where employee.username = '$_SESSION[username]' order by assign.id desc");
        if(mysqli_num_rows($res1)>0) {
          ?>
          <table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Project Code</th>
      <th scope="col">Module Name</th>
      <th scope="col">Dead Date</th>
      <th scope="col">Program File</th>
      <th scope="col">Testing File</th>
      <th scope="col">Posted On</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $count = 1;
      while($row1 = mysqli_fetch_assoc($res1)) {
        ?>
        <tr>
        <th scope="row"><?php echo $count;?></th>
        <td><?php echo $row1['project_code'];?></td>
        <td><?php echo $row1['mname'];?></td>
        <td><?php echo $row1['dead_date'];?></td>
        <td><a download href="<?php echo $row1['program_file'];?>"><i class="fa fa-download"></i> Download</a></td>
        <td><a download href="<?php echo $row1['test_file'];?>"><i class="fa fa-download"></i> Download</a></td>
        <td><?php echo $row1['date'];?></td>
        </tr>
        <?php
        $count++;
      }
      ?>
  </tbody>
</table>
<?php
        }
        else {
          echo "<h5>No records found</h5>";
        }
      ?>
    </div>
  </div>
</section>
</div>
<?php
    include 'footer.php';
?>