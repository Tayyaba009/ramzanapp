        <div class="off-canvas-section">
            <div class="off-canvas-wrap">
                <div class="off-canvas-head mb-30">
                    <div class="logo">
                        <a href="index.html">
                            <img src="assets/img/logo/logo.svg" alt="logo">
                        </a>
                    </div>
                    <div class="off-canvas-close"><i class="fa-regular fa-xmark"></i></div>
                </div>
                <div class="off-canvas-menu mb-30">
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
           
            </div>
            <div class="off-canvas-overlay"></div>
        </div>