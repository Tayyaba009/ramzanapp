<?php 
include_once('connection.php');
if (isset($_POST['submit'])){


	$data = Array(
		  'C_Name'	=>$_POST['C_Name'],
      'C_Password'	=>md5($_POST['C_Password'])
	  
		  );

	if (($_POST['id'] >0)){
		$db->where('C_ID', $_POST['id']);
		$db->update('creators_list', $data);



	} else {

		$db->insert('creators_list', $data);


	}
	header("location: index.php?Loc=AdminList");
	exit(0);	
}


$C_Name = '';
$C_Password = '';

if (isset($_GET['id'])){
	
	$db->where('C_ID', $_GET['id']);
	$values = $db->getOne('creators_list');
	if ($values !== NULL)
	{
		$C_Name = $values['C_Name'];
    $C_Password = "";
		

	}
	
}


?>

<section class="content">
  <div class="row">
    <div class="col-lg-12 col-xs-12"> 
      <!-- small box -->
      
      <form id="AddNewVideo" enctype = "multipart/form-data" action="AddNewAdmin.php" method="POST" class="form-horizontal" >
        <div>
          <input name="id" type="hidden" value="<?=isset($_GET['id'])?$_GET['id']:''?>" required class="form-control">
        </div>
        <fieldset>
          <legend>Please fill the Following Form</legend>
          <div class="form-group">
            <label for="C_Name" class="col-sm-4 control-label">UserName<sup class="text-danger">* </sup>: </label>
            <div class="col-sm-6">
              <input id="C_Name" name="C_Name" type="text" value="<?=$C_Name?>" required class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="C_Password" class="col-sm-4 control-label">Password<sup class="text-danger">* </sup>: </label>
            <div class="col-sm-6">
              <input id="C_Password" name="C_Password" type="password" value="<?=$C_Password?>" required class="form-control">
            </div>
          </div>
    
		   <div class="form-group">
            <label for="name" class="col-sm-4 control-label"> <sup class="text-danger">  </sup> </label>
            <div class="col-sm-6">
              <button type="submit" name = "submit" class="btn btn-balanced"> Add </button>
            </div>
          </div>
          
        </fieldset>
      </form>
    </div>
  </div>
</section>

