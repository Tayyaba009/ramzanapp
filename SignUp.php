<?php 
include_once('connection.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$message = "";

if(isset($_POST['SubmitNow'])){
        $db->where('Email', $_POST['Email']);
    $user = $db->get('consumer_list');

    if($_POST['Pass'] !== $_POST['Password']){
        $message =   '<p class="alert alert-danger">Password Not Match.</p>';

    }elseif ($user != NULL) {

       $message =   '<p class="alert alert-danger">Email Already Exist.</p>';

}else{

    $data = Array(
        'Cons_Name'=> $_POST['Cons_Name'],
        'Email'=> $_POST['Email'],
        'Pass'=> md5($_POST['Pass'])
        );
        
    $user = $db->insert('consumer_list', $data);
  if($user){

 header('Location: Login.php');
    
  } else
  {
        $message =   '<p class="alert alert-danger">Some thing went Wrong.</p>';
    exit (0);
  }  
}
  

        
}
        



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">

    <!-- All CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/venobox.min.css">
    <link rel="stylesheet" href="assets/css/spacing.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <title>Signup - Educad Online Courses & Education HTML5 Template</title>
</head>

<body>

    <!-- main-page-wrapper start -->
    <div class="main-page-wrapper">

        <!-- preloader start -->
                <?php include_once('preloader.php');?>
        <!-- preloader end -->




        <!-- header start -->
             <header class="header-area header-style-2">
          <?php include_once('headertop.php');?>
            <div class="main-header-area header-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-6 d-flex align-items-center">
                            <div class="logo logo-hide">
                                <a href="index.html">
                                    <img class="logo-dark" src="assets/img/logo/logo.svg" alt="logo">
                                    <img class="logo-white" src="assets/img/logo/logo-white.svg" alt="logo">
                                </a>
                                <div class="shape"></div>
                            </div>
                    
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-8 col-6 d-flex justify-content-end align-items-center">
                            <div class="main-menu d-none d-xl-block">
                                <ul>
                                           <?php if(isset($_SESSION['U_ID'] )) {?>
                                       <li><a href="index.php">Dashboard</a></li>
                                      <li><a href="LogOut.php">Log me Out</a></li>
                                        <?php } else {?>
                                    <li><a href="Login.php">Log me In</a></li>
                                     <li><a href="SignUp.php">Sign Up</a></li>
                                       <li><a href="panel/login.php">Admin</a></li>
                                         <?php }?>
                                </ul>
                            </div>
                      
                            <div class="cart-sidebar">
                                <a class="shopping-cart" href="#">
                                    <img src="assets/img/icon/cart-w.svg" alt="icon">
                                    <span class="badge">0</span>
                                </a>
                            </div>
                            <div class="open-menu-bar">
                                <div class="bar-1"></div>
                                <div class="bar-2"></div>
                                <div class="bar-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->

        <!-- off-canvas start -->
          <?php include_once('off_canvas.php'); ?>
        <!-- off-canvas end -->

        <main>
 

            <!--signup-section start-->
            <div class="signup-section pt-150 pb-150 pt-lg-120 pb-lg-90 pt-md-80 pb-md-50 pt-xs-50 pb-xs-20">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6">
                            <div class="signup-form">
                                <div class="section-title text-center mb-50">
                                    <div class="title">
                                           <?php echo $message;?>
                                        <h2>Create Your Account</h2>
                                    </div>
                                </div>
                                <form  action="SignUp.php" method="post">
                                    <div class="input-wrap mb-20">
                                        <span><img src="assets/img/icon/profile.svg" alt="icon"></span>
                                        <input type="text" placeholder="Full Name" name = "Cons_Name" required>
                                    </div>
                                    <div class="input-wrap mail mb-20">
                                        <span><img src="assets/img/icon/message-bold.svg" alt="icon"></span>
                                        <input type="email" placeholder="Email " required name = "Email">
                                    </div>
                                
                                    <div class="input-wrap pass mb-20">
                                        <span><img src="assets/img/icon/lock-bold.svg" alt="icon"></span>
                                        <input type="password" placeholder="Password" name = "Password" required>
                                    </div>
                                    <div class="input-wrap pass mb-20">
                                        <span><img src="assets/img/icon/lock-bold.svg" alt="icon"></span>
                                        <input type="password" placeholder="Confirm Password" name = "Pass" required>
                                    </div>
                               
                                    <div class="col-12">
                                        <div class="submit-btn">
                                            <button class="signup-btn btn-1" name = "SubmitNow" value = "SubmitNow" type="submit">Submit Now</button>
                                   
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--signup-section end-->

        </main>

        <!-- Footer start -->
                <?php include_once('footer.php');?>
        <!-- Footer end -->



        <!--scrollToTopBtn end-->
        <a id="scrollToTopBtn" class="progress-wrap">
            <i class="fa-regular fa-arrow-up-from-bracket"></i>
        </a>
    </div>
    <!-- main-page-wrapper end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/odometer.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/jquery-ui-slider-range.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/venobox.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>