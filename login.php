<?php session_start() ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Techmax - Technology IT Solutions Consultancy HTML5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/plugins/all.min.css">
    <link rel="stylesheet" href="assets/css/plugins/flaticon.css">
    <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/aos.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="main-wrapper">
        <div class="section login-register-section">
            <div class="container">
                <div class="login-register-wrap">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="login-register-box">
                                <div class="section-title">
                                    <h2 class="title">Login</h2>
                                </div>
                                <div class="login-register-form">
                                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
                                        <div class="single-form">
                                            <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                                        </div>
                                        <div class="single-form">
                                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                        </div>
                                        <div class="form-btn">
                                            <button class="btn" name="login">Login</button>
                                        </div>
                                        <span class="header-one">Have An Account? <a href="signup.php">Create An Account</a></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'dbconnect.php';
    if(isset($_POST['login'])){
        $email =  $_POST['email'];
        $password =  $_POST['password'];

        $email_search = "select * from registration where email='$email'";
        $query = mysqli_query($con, $email_search);
        
        $email_count = mysqli_num_rows($query);
        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];
            $pass_decode = password_verify($password, $db_pass);
            if ($pass_decode) {
                ?>
                <script>
                    alert("Login Successfully")
                    </script>
                <?php
                header('location:index.php');
            }
            else{
                ?>
                <script>
                    alert("Password Incorrect")
                </script>
                <?php
            }
        }
        else{
            ?>
                <script>
                    alert("Invalid Email")
                </script>
            <?php
        }

    }
    ?>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/aos.js"></script>
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <script src="assets/js/plugins/back-to-top.js"></script>
    <script src="assets/js/plugins/jquery.counterup.min.js"></script>
    <script src="assets/js/plugins/appear.min.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>