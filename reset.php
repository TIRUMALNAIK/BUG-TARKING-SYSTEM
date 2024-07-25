<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
  require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
  require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

  $mail = new PHPMailer(true);

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
        $email = $_POST['email'];
        $res = mysqli_query($conn, "select name, password, email from user where email = '$email' and status = true ");
        if(mysqli_num_rows($res)>0)
        {
            $rows = mysqli_fetch_assoc($res);
            $name1 = $rows['full_name'];
            $useremail1 = $rows['email'];
            $password1 = $rows['password'];
            $appname = "Bug-Track";

            try 
            {
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true;
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
              $mail->Port = 587;

              $mail->Username = 'project.tirumalnaik9535@gmail.com'; // YOUR gmail email
              $mail->Password = 'gyuo qaim aior sjdi'; // YOUR gmail password

              // Sender and recipient settings
              $mail->setFrom('project.tirumalnaik9535@gmail.com', $appname);
              $mail->addAddress($useremail1, $name1);
              $mail->addReplyTo('project.tirumalnaik9535@gmail.com', $appname); // to set the reply to

              // Setting the email content
              $mail->IsHTML(true);
              $mail->Subject = "Forgot Password : ".$appname;
              $mail->Body = 'Dear '.$name1.'<br> You recently requested reset your password<br> Password : '.$password1.'<br><br> Thank you<br>Team '.$appname;
              $mail->AltBody = 'Forgot password reset email';

              $mail->send();
              // echo "Email message sent.";
              
              echo "<script>alert('Password has been sent to your registered email..!');location.href='signin.php'</script>";
            } 
            catch (Exception $e) 
            {
                // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                echo "<script>alert('Invalid data you provided..!');</script>";

            }

        }
        else
        {
          echo "<script>alert('Invalid data you provided..!');</script>";
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
    <title>Bug Tracking - Reset</title>
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
                            <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                        </div>
                        <input type="email" class="form-control icon" name="email" placeholder="Email Address" style="padding-left:18px" required>
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" name="submit" value="Reset"
                            class="btn btn-outline-danger float-right login_btn">
                    </div><br>

                    <a href="signin.php" class="logo_title float-left mt-4" style="color:#dc4f72"> Remember your password? Sign In </a><br>

                </form>
            </div>
        </div>
    </div>
</body>

</html>