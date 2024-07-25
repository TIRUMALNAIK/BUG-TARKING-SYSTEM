<?php
    include 'config.php';
    session_start();
    if(isset($_SESSION['login']))
    {
        header ("Location: index.php");
    }
    if(isset($_POST['submit']))
    {
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];
        if($pass==$cpass)
        {
            $uname = $_POST['uname'];

            $res = mysqli_query($conn, "select username from user where username = '$uname'");
            if(mysqli_num_rows($res)>0) {
                echo "<script>alert('Oops, Username already exists. Kindly choose different username..')</script>";
            }
            else {
                $fname = $_POST['fname'];
                $email = $_POST['email'];
                $num = $_POST['contact'];
                
                if(mysqli_query($conn, "insert into user(name, email, username, password, image, status, contact)values('$fname', '$email', '$uname', '$pass', 'user/user_image.jpg', true, '$num')"))
                {
                    if(mysqli_query($conn, "insert into login(username, password, type, status)values('$uname', '$pass', 'User', true)"))
                    {
                        echo "<script>alert('User registered successfully..!');location.href='signin.php'</script>";
                    }
                    else
                    {
                        echo "<script>alert('Ooops, Unable to insert your data. Kindly try after sometimes..')</script>";
                    //    echo mysqli_error($conn);
                    }
                }
                else
                {
                    echo "<script>alert('Ooops, Unable to insert your data. Kindly try after sometimes..')</script>";
                //    echo mysqli_error($conn);
                }
            }
            
        }
        else
        {
            echo "<script>alert('Password Mis-Match..')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
       
        .card {
            border: 3px solid #dc4f72;
        }
        .card-login {
            margin-top: 60px;
            padding: 18px;
            max-width: 30rem;
            margin-bottom:50px;
        }

        .card-header {
            color: #fff;
            /*background: #ff0000;*/
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 600 !important;
            margin-top: 10px;
            border-bottom: 0;
        }

        .input-group-prepend span{
            width: 50px;
            background-color: #dc4f72;
            color: #fff;
            border:0 !important;
        }

        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
        }

        .login_btn{
            width: 130px;
        }

        .login_btn:hover{
            color: #fff;
            background-color: #dc4f72;
        }

        .btn-outline-danger {
            color: #fff;
            font-size: 18px;
            background-color: #dc4f72;
            background-image: none;
            border-color: #dc4f72;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1.2rem;
            line-height: 1.6;
            color: #dc4f72;
            background-color: transparent;
            background-clip: padding-box;
            border: 1px solid #dc4f72;
            border-radius: 0;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .input-group-text {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.375rem 0.75rem;
            margin-bottom: 0;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.6;
            color: #495057;
            text-align: center;
            white-space: nowrap;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 0;
        }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>Bug Tracking - Sign Up</title>
</head>

<body>
    <div class="container">
        <div class="card card-login mx-auto text-center bg-dark">
            <div class="card-header mx-auto bg-dark">
                <span class="h1" style="font-family:Cursive">Bug-Tracking </span><br />

            </div>
            <div class="card-body">
                <form action="#" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control icon" name="fname" placeholder="Full Name" style="padding-left:18px" required>  
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control icon" name="uname"  placeholder="User Name" style="padding-left:18px" required> 
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                        </div>
                        <input type="email" class="form-control icon" name="email" placeholder="Email Address" style="padding-left:18px" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                        </div>
                        <input type="text" title="Please enter 10 digit valid number" pattern="[6789][0-9]{9}" class="form-control icon" name="contact" placeholder="Contact Number" style="padding-left:18px" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control icon" placeholder="Password" style="padding-left:18px" required name="password">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control icon" placeholder="Confirm Password" style="padding-left:18px" required name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    </div>
                    
                    <a href="signin.php" class="logo_title float-right" style="color:#dc4f72"> Already have an account? Sign In </a><br>

                    <div class="form-group mt-3">
                        <input type="submit" name="submit" value="Sign Up"
                            class="btn btn-outline-danger float-right login_btn">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>