
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
                    <li class="nav-item <?php if($_SERVER['REQUEST_URI']=='/bug-tracking/index.php'){echo 'active';}?>">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item <?php if($_SERVER['REQUEST_URI']=='/bug-tracking/task.php'){echo 'active';} ?>">
                        <a class="nav-link" href="task.php">Program</a>
                    </li>

                    <li class="nav-item <?php if($_SERVER['REQUEST_URI']=='/bug-tracking/test.php'){echo 'active';} else if($_SERVER['REQUEST_URI']=='/bug-tracking/add-test.php'){echo 'active';}?>">
                        <a class="nav-link" href="test.php">Tasks</a>
                    </li>
                
                    <li class="nav-item dropdown <?php if($_SERVER['REQUEST_URI']=='/bug-tracking/admin-profile.php'){echo 'active';} else if($_SERVER['REQUEST_URI']=='/bug-tracking/admin-setting.php'){echo 'active';}?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                            <?php 
                                $res = mysqli_query($conn, "select * from employee where status = true and username = '$_SESSION[username]'");
                                $row = mysqli_fetch_assoc($res);
                            ?>
                        <div class="dropdown-menu drop-3">
                            <div class="profile d-flex mr-o">
                                <div class="profile-l align-self-center">
                                    <img src="<?php echo $row['image'];?>" class="img m-3" alt="Profile image" width="50" height="50">
                                </div>
                                <div class="profile-r align-self-center">
                                    <h3 class="sub-title-w3-agileits"><?php echo $row['username'];?></h3>
                                </div>
                            </div>
                                <a class="dropdown-item mt-3" href="tester-profile.php"><i class="fa fa-user mr-3"></i>Profile</a>
                                <a class="dropdown-item" href="tester-settings.php"><i class="fa fa-cog mr-3"></i>Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off mr-3"></i>Logout</a>
                        </div>
                    </li>

                    
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--/header-->