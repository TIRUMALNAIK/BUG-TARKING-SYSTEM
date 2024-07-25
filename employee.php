
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'admin-header.php';

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    if(isset($_GET['del'])) {
        if(mysqli_query($conn,"delete from employee where id = '".$_GET['id']."'")) {
            echo "<script>alert('Employee deleted successfully..!');location.href='employee.php';</script>";
        }
        else {
            echo "<script>alert('Oops, Unable to delete employee..!')</script>";
        }
    }
?>
<!-- index-block1 -->
<div class="w3l-index1">

<section class="w3l-index3 py-3">
<div class="container mt-3">
  <div class="header-section mb-5 text-center">
        <h3>Employee List</h3>
      </div>
      <a class="float-right h5" href="add-employee.php"><i class="fa fa-plus-square"></i> Add Employee</a><br><br>
    <div class="row align-items-center">
    <?php 
        $res1 = mysqli_query($conn, "select employee.name, employee.email, employee.type, employee.date, company.name as cname, department.name as dname from employee join department on department.id = employee.department_id join company on company.id = employee.company_id order by employee.id desc");
        if(mysqli_num_rows($res1)>0) {
          ?>
          <table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Company</th>
      <th scope="col">Department</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Designation</th>
      <th scope="col">Created On</th>
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
        <td><?php echo $row1['cname'];?></td>
        <td><?php echo $row1['dname'];?></td>
        <td><?php echo $row1['name'];?></td>
        <td><?php echo $row1['email'];?></td>
        <td><?php echo $row1['type'];?></td>
        <td><?php echo $row1['date'];?></td>
        <td><a href="employee.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a></td>
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