<?php
include_once('connection.php');
$res = $db->get("AllComments");


?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box"><!-- /.box-header -->
                <div class="box-body">

                    <table id="data" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            <th>S No</th>
                                <th>Commentor Name</th>
								<th>Email</th>
                                <th>Vid Title</th>
                                <th>Date</th>

                                <th>Comment</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$i=0;
							
							foreach($res as $val) {
								$i = $i+1;
                            ?>
                            
                            <tr>
                            
                                <td><?=$i?></td>
                                <td><?=$val['Cons_Name'] ?></td>
                                <td><?=$val['Email'] ?></td>
                                <td><?=$val['Vid_Title'] ?></td>
                                <td><?=$val['Date'] ?></td>
                                <td><?=$val['Comm'] ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                       
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

           
                
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
