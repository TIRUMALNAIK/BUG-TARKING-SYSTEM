
<?php
    session_start();
    include 'config.php';
    include 'link.php';
    include 'admin-header.php';

    if(!isset($_SESSION['login'])) {
        header("Location: signin.php");
    }
    if(isset($_GET['del'])) {
        if(mysqli_query($conn,"delete from user where id = '".$_GET['id']."'")) {
            echo "<script>alert('User deleted successfully..!');location.href='user.php';</script>";
        }
        else {
            echo "<script>alert('Oops, Unable to delete user..!')</script>";
        }
    }
?>
<!-- index-block1 -->
<div class="w3l-index1">

<section class="w3l-index3 py-3">
<div class="container mt-3">
  <div class="header-section mb-5 text-center">
        <h3>User List</h3>
      </div>
    <div class="row align-items-center">
    <?php 
        $res1 = mysqli_query($conn, "select * from user order by id desc");
        if(mysqli_num_rows($res1)>0) {
          ?>
          <table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Email</th>
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
        <td><?php echo $row1['username'];?></td>
        <td><?php echo $row1['contact'];?></td>
        <td><?php echo $row1['email'];?></td>
        <td><?php echo $row1['date'];?></td>
        <td><a href="user.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a></td>
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