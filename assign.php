
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'manager-header.php';

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    if(isset($_GET['del'])) {
        if(mysqli_query($conn,"delete from assign where id = '".$_GET['id']."'")) {
            echo "<script>alert('Task deleted successfully..!');location.href='assign.php';</script>";
        }
        else {
            echo "<script>alert('Oops, Unable to delete task..!')</script>";
        }
    }
?>
<!-- index-block1 -->
<div class="w3l-index1">

<section class="w3l-index3 py-3">
<div class="container mt-3">
  <div class="header-section mb-5 text-center">
        <h3>Task List</h3>
      </div>
      <a class="float-right h5" href="add-assign.php"><i class="fa fa-plus-square"></i> Add Task</a><br><br>
    <div class="row align-items-center">
    <?php 
        $res1 = mysqli_query($conn, "select assign.id, assign.programmer_id, assign.tester_id, project.project_code, module.name as mname, assign.dead_date, assign.date, assign.test_file, assign.program_file from assign join module on module.id = assign.module_id join project on project.id = assign.project_id order by assign.id desc");
        if(mysqli_num_rows($res1)>0) {
          ?>
          <table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Programmer Name</th>
      <th scope="col">Tester Name</th>
      <th scope="col">Project Code</th>
      <th scope="col">Module Name</th>
      <th scope="col">Dead Date</th>
      <th scope="col">Program File</th>
      <th scope="col">Testing File</th>
      <th scope="col">Posted On</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $count = 1;
      while($row1 = mysqli_fetch_assoc($res1)) {
        
        ?>
        <tr>
        <th scope="row"><?php echo $count;?></th>
        <td><?php  $res2 = mysqli_query($conn, "select name from employee where id = '$row1[programmer_id]'"); $row2 = mysqli_fetch_assoc($res2); echo $row2['name'];?></td>
        <td><?php  $res3 = mysqli_query($conn, "select name from employee where id = '$row1[tester_id]'"); $row3 = mysqli_fetch_assoc($res3); echo $row3['name'];?></td>
        <td><?php echo $row1['project_code'];?></td>
        <td><?php echo $row1['mname'];?></td>
        <td><?php echo $row1['dead_date'];?></td>
        <td><a download href="<?php echo $row1['program_file'];?>"><i class="fa fa-download"></i> Download</a></td>
        <td><a download href="<?php echo $row1['test_file'];?>"><i class="fa fa-download"></i> Download</a></td>
        <td><?php echo $row1['date'];?></td>
        <td><a href="assign.php?id=<?php echo $row1['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a></td>
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