<?php
include_once('connection.php');

if(isset($_GET['Videos_Id'])){

     // echo '<div class="review-ratting">';
     //                                          echo '  <i class="fa-solid fa-star active"></i>';
     //                                          echo '  <i class="fa-solid fa-star active"></i>';
     //                                          echo '  <i class="fa-solid fa-star active"></i>';
     //                                          echo '  <i class="fa-solid fa-star active"></i>';
     //                                          echo '  <i class="fa-solid fa-star"></i>';
     //                                       echo ' </div>';

    $db->where('Vid_ID', $_GET['Videos_Id']);

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
       }
    ?>