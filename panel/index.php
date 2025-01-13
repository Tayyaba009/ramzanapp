<?php
include_once('connection.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$mUserName = '';
$mFullName  = "";
$ptitle = '';
if (!isset($_SESSION['C_Name'])){
   
    // header('Location: login.php');
}
else{
    $mUserName = $_SESSION['C_Name'];
  //$mFullName  = $_SESSION['FULLNAME'];
}

$Loc = "";
if (isset($_GET['Loc'])) 
    $Loc = $_GET['Loc'];

if($Loc==='logout'){
  $_SESSION['C_Name']="";
  unset($_SESSION['C_Name']);
  $_SESSION['C_ID'] ="";
  unset($_SESSION['C_ID']);
  session_destroy();
  header("Location: login.php");
  exit(0);
}

if ($Loc != '') {
  $sPage = $Loc.'.php';
} else {
    $sPage = 'Frontpage.php';
  
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment : <?=$ptitle?> </title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  
	<link href="asset/css/style.css" rel="stylesheet">

	<!-- end: Css -->

	<link rel="shortcut icon" href="asset/img/logomi.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script src="asset/js/jquery.min.js"></script>
        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js"></script>

        <style>
        .navbar {
          background-color: navy-blue !important;
        }
        .clr {
          background-color: navy-blue !important;
          
        }

      </style>
  </head>

 <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open clr">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="index.php" class="navbar-brand"> 
                 <b>COM 769</b>
                </a>



              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><?=$mUserName?></span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li>
                      
                        <li><a href="index.php?Loc=logout"><span class="fa fa-power-off "></span> Log Out</a></li>
                     
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
<?php require_once("sidebar.php"); ?>


  		
          <!-- start: content -->
            <div id="content">
                <div class="panel">
                  <div class="panel-body">



                    <?php
        
                include_once $sPage;
                ?>   
            </div>
        </div>       
      </div>
    </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

    <!-- start: Javascript -->
   
    <script src="asset/js/jquery.ui.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
  
     
   
    
    <!-- plugins -->
    <script src="asset/js/plugins/moment.min.js"></script>

<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
  
    <script src="asset/js/plugins/jquery.vmap.min.js"></script>
    <script src="asset/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="asset/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="asset/js/plugins/chart.min.js"></script>
    <script src="plugins/jqueryvalidation/jquery.validate.js"></script>

<script src="asset/js/plugins/flot/jquery.flot.min.js"></script>
 <script src="asset/js/plugins/flot/jquery.flot.time.min.js"></script>
 <script src="asset/js/plugins/flot/jquery.flot.navigate.min.js"></script>
 <script src="asset/js/plugins/flot/jquery.flot.stack.min.js"></script>
 <script src="asset/js/plugins/jquery.nicescroll.js"></script> 

    <!-- custom -->
     <script src="asset/js/main.js"></script>
    
  <!-- end: Javascript -->
  </body>
</html>


<script type="text/javascript">
  function showAjaxModal(url)
  {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" /></div>');
    
    // LOADING THE AJAX MODAL
    jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
    
    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
      url: url,
      success: function(response)
      {
        jQuery('#modal_ajax .modal-body').html(response);
      }
    });
  }
  </script>
    
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">PMS</h4>
                </div>
                
                <div class="modal-body" style="height:auto; overflow:auto;">
                
                    
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <script type="text/javascript">
  function confirm_modal(delete_url)
  {
    jQuery('#modal-4').modal('show', {backdrop: 'static'});
    document.getElementById('delete_link').setAttribute('href' , delete_url);
  }
  </script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link">delete</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>   