<?php 
include_once('connection.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


 $searchTerm = isset($_POST['search']) ? trim($_POST['search']) : '';



if (!empty($searchTerm)) {
    $searchTerm = '%'. $_POST['search']. '%';

    $db->where('Title_of_Video', $searchTerm, 'LIKE');
     $db->orwhere('Tags_of_Video', $searchTerm, 'LIKE');
 
    $_POST['search'] = "";
    unset($_POST['search']);
}
$db->orderBy('Vid_ID ', 'DESC');
$listdata = $db->get("videos_list");


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

    <title>Course Details - Educad Online Courses & Education HTML5 Template</title>
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

               <?php if(isset($_SESSION['U_ID'] )) {?>
        <main>


            <!-- Course Details start -->
            <div class="course-details-section pt-150 pb-150 pt-lg-120 pb-lg-120 pt-md-80 pb-md-80 pt-xs-50 pb-xs-50">
                <div class="container">

                         <?php
                            $i=0;
                            
                            foreach($listdata as $row) {
                                $i = $i+1;
                            ?>

                    <div class="row justify-content-center">
                        <div class="col-xl-1 col-lg-1"></div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="main-content-wrap">
                                <div class="course-header">
                                    <div class="course-header-title">
                                        <h2><?=$row['Vid_Title'] ?></h2>
                                    </div>
                       
                               
                                    <div class="course-header-img">
                                                 <video  controls style = "width:100%;display:block !important;height:400px;">
                                      <source src="Vid/<?=$row['Vid_Source'] ?>" type="video/mp4">
                                      Your browser does not support HTML video.
                                    </video>
                                    </div>
                                </div>
                                <div class="course-description-wrap">
                                    <div class="course-description-title">
                                        <h4><?=$row['Vid_Tags'] ?></h4>
                                        <div class="bar"></div>
                                    </div>
                  
                                      <div class="about-content">

                                                    <input type = "hidden" id = "U_ID" name = "U_ID" value  = "<?php echo $_SESSION['U_ID']?>" />
     <textarea style = "width:100%;margin-bottom:2px;" id="Comm-Idn<?php echo $row['Vid_ID'];?>" placeholder="Write your comment..."></textarea>
      <button onclick="CommAdd(<?php echo $row['Vid_ID'];?>)"> Submit</button>
              </div>

                                </div>
                  
                                <div class="course-reviews-wrap" id = "Video-Comm-<?php echo $row['Vid_ID']; ?>">
                                    <div class="reviews-title">
                                        <h3> Reviews</h3>
                                        <div class="overview-bar"></div>
                                    </div>
                               
                                        <?php
    $db->where('Vid_ID', $row['Vid_ID']);

    $listdata1 = $db->get("allcomments");
    foreach($listdata1 as $row1) {   
    

     
                                      echo ' <div class="review" id="CM-'. $row1['Com_ID']. '">';
                                        echo '<div class="review-info" >';
                                            echo '<div class="name">';
                                               echo ' <h4>'.$row1['Cons_Name'].'</h4>';
                                               echo ' <span>'.$row1['Date'].'</span>';
                                           echo ' </div>';
                                    
                                           echo ' <div class="review-text">';
                                           echo '     <p>'.htmlspecialchars($row1['Comm']).'</p>';
                                         echo '   </div>';
                                       echo ' </div>';
                                         echo ' </div>';
                                 
        
           }
    ?>
      


                   
                       
                                </div>
                          
                        </div>
                      
                    </div>
                <?php } ?>
                </div>
            </div>
            <!-- Course Details end -->

        </main>
    <?php } else { ?>

        <main>
            <h2 class = "text-center">Log In To View & Enjoy New Videos</h2>
        </main>
          <?php } ?>
        <!-- Footer start -->
        <?php include_once('footer.php');?>
        <!-- Footer end -->


        <!--scrollToTopBtn end-->
        <a id="scrollToTopBtn" class="progress-wrap">
            <i class="fa-regular fa-arrow-up-from-bracket"></i>
        </a>
    </div>
    <!-- main-page-wrapper end -->

    <script>
function CommAdd(videoId) {

    var comment = document.getElementById('Comm-Idn' + videoId).value;
    var userid = document.getElementById('U_ID').value;
    if (comment === '') {
    alert('Please write a comment.');
    return;
    }
    
    // Send the comment to the server via AJAX
     var xhr = new XMLHttpRequest(); 
     xhr.open('POST', 'Comm_Add.php', true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {

    if (xhr.readyState== 4 && xhr.status == 200) {
    
    // Comment submitted successfully, clear the input field 
    document.getElementById('Comm-Idn' + videoId).value = '';
    // Reload the comments for this video
    LoadCommentsSection(videoId);
    }
};
    var data = 'Videos_Id=' + videoId + '&comment=' + encodeURIComponent(comment)+'&userid='+userid;
    console.log(data);
    xhr.send(data);
    }


    
function LoadCommentsSection (videoId) {
// Fetch existing comments for the video via AJAX 

 var xhr = new XMLHttpRequest();
xhr.open('GET', 'GetAllComm.php?Videos_Id=' + videoId, true);
xhr.onreadystatechange = function () {
if (xhr.readyState == 4 && xhr.status == 200) {
    alert(xhr.responseText);
    document.getElementById('Video-Comm-' + videoId).innerHTML = xhr.responseText;

}
// Update the comments section with the fetched comments 
};
xhr.send();
}


</script>

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