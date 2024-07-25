
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'admin-header.php';

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    if(isset($_GET['del'])) {
        if(mysqli_query($conn,"delete from company where id = '".$_GET['id']."'")) {
            echo "<script>alert('Company deleted successfully..!');location.href='company.php';</script>";
        }
        else {
            echo "<script>alert('Oops, Unable to delete company..!')</script>";
        }
    }
?>
<!-- index-block1 -->
<div class="w3l-index1">

<section class="w3l-index3 py-3">
<div class="container mt-3">
  <div class="header-section mb-5 text-center">
        <h3>Company List</h3>
      </div>
      <a class="float-right h5" href="add-company.php"><i class="fa fa-plus-square"></i> Add Company</a><br><br>
    <div class="row align-items-center">
    <?php 
        $res1 = mysqli_query($conn, "select * from company order by id desc");
        if(mysqli_num_rows($res1)>0) {
          ?>
          <table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Branch</th>
      <th scope="col">Contact</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
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
        <td><?php echo $row1['name'];?></td>
        <td><?php echo $row1['branch'];?></td>
        <td><?php echo $row1['contact'];?></td>
        <td><?php echo $row1['email'];?></td>
        <td><?php echo $row1['address'];?></td>
        <td><?php echo $row1['date'];?></td>
        <td><a href="company.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a></td>
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