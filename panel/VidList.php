<?php
include_once('connection.php');
$listdata = $db->get("videos_list");


?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box"><!-- /.box-header -->
                <div class="box-body">
<a href="index.php?Loc=AddNewVideo" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        Add New </a>
                    <table id="data" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S No</th>
                                <th>Title</th>
                                 <th># Tags</th>
                                 <th>File Name</th>
                                <th>Action</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$i=0;
							
							foreach($listdata as $val) {
								$i = $i+1;
                            ?>
                            
                            <tr>
                            
                                <td><?=$i?></td>
                                <td><?=$val['Vid_Title'] ?></td>
                                <td><?=$val['Vid_Tags'] ?></td>
                                <td><?=$val['Vid_Source'] ?></td>
                                 <td class="col-md-1"><div class="btn-group">
            <button typ e="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span> </button>
            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
              
              <li> <a href="index.php?Loc=AddNewVideo&id=<?=$val['Vid_ID']?>"> <i class="entypo-pencil"></i> Edit </a> </li>
              
              <!-- STUDENT DELETION LINK -->
              <li> <a href="#" onclick="confirm_modal('delete.php?tbl=videos_list&kfld=Vid_ID&kval=<?=$val['Vid_ID']?>&Loc=VidList');"> <i class="entypo-trash"></i> Delete </a> </li>
              
              <!-- STUDENT DELETION LINK -->
              
            </ul>
        </div></td>
                                
                               
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
