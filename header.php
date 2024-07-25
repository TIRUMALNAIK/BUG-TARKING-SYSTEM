
<!--header-->
<header id="site-header" class="fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg stroke">
            <a class="navbar-brand" href="index.php">
                <span class="fa fa-bug"></span> Bug-Tracking
            </a>
            <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                            <?php 
                                include 'config.php'; 
                                $res = mysqli_query($conn, "select * from user where status = true and username = '$_SESSION[username]'");
                                $row = mysqli_fetch_assoc($res);
                            ?>
                        <div class="dropdown-menu drop-3">
                            <div class="profile d-flex mr-o">
                                <div class="profile-l align-self-center">
                                    <img src="user/user_image.jpg" class="img m-3" alt="Profile image" width="50" height="50">
                                </div>
                                <div class="profile-r align-self-center">
                                    <h3 class="sub-title-w3-agileits"><?php echo $row['name'];?></h3>
                                </div>
                            </div>
                                <a class="dropdown-item mt-3" href="profile.php"><i class="fa fa-user mr-3"></i>Profile</a>
                                <a class="dropdown-item" href="setting.php"><i class="fa fa-cog mr-3"></i>Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off mr-3"></i>Logout</a>
                        </div>
                    </li>
                    <li class="nav-item @@about-active">
                        <a class="nav-link" href="user.php">User</a>
                    </li>
                    <li class="nav-item @@about-active">
                        <a class="nav-link" href="department.php">Department</a>
                    </li>
                    <li class="nav-item @@services-active">
                        <a class="nav-link" href="company.php">Company</a>
                    </li>
                    <li class="nav-item @@contact-active">
                        <a class="nav-link" href="employee.php">Employee</a>
                    </li>


                    
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--/header-->