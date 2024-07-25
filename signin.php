<?php
    include 'config.php';
    session_start();
    if(isset($_SESSION['login']))
    {
        header ("Location: index.php");
    }
    else
    {
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $pass = $_POST['password'];

            $res = mysqli_query($conn, "select username, type from login where status = true and username = '$username' and password ='$pass'");
            if(mysqli_num_rows($res)>0)
            {
                $row = mysqli_fetch_assoc($res);
                $_SESSION['username'] = $row['username'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['login'] = true;

                header("Location: index.php");
            }
            else
            {
                echo "<script>alert('Invalid credentials..Kindly try with valid data')</script>";
            }
            
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
            margin-top: 100px;
            padding: 18px;
            max-width: 30rem;
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
    <title>Bug Tracking - Sign In</title>
</head>

<body>
    <div class="container">
        <div class="card card-login mx-auto text-center bg-dark">
            <div class="card-header mx-auto bg-dark">
                <span class="h1" style="font-family:Cursive">Bug-Tracking </span><br />

            </div>
            <div class="card-body my-4">
                <form action="" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter username" required="" name="username">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" required="" name="password">
                    </div>
                    
                     <a href="try.php" class="logo_title float-right" style="color:#dc4f72"> Forgot your password? Reset </a><br> -->

                    <div class="form-group mt-3">
                        <input type="submit" name="submit" value="Sign In"
                            class="btn btn-outline-danger float-right login_btn">
                    </div><br>

                    <!-- <a href="signup.php" class="logo_title float-left mt-4" style="color:#dc4f72"> Don't have an account? Sign Up </a><br> -->

                </form>
            </div>
        </div>
    </div>
</body>

</html>