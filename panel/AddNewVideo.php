<?php 
include_once('connection.php');
if (isset($_POST['submit'])){

  If ($_FILES['ChoseVideo']['error'] === UPLOAD_ERR_OK) 
{

 $fileTmpPath = $_FILES['ChoseVideo']['tmp_name']; 
 $fileName = $_FILES['ChoseVideo']['name']; 
 $fileSize = $_FILES['ChoseVideo']['size'];
  $fileType = $_FILES['ChoseVideo']['type'];
   $fileNameCmps = explode(".", $fileName); 
   $fileExtension = strtolower(end($fileNameCmps));

        // Specify the allowed file extensions.
        $allowablefileExtensions = ['mp4', 'avi','mov','mkv'];

        if (in_array($fileExtension, $allowablefileExtensions)) { 
        // Directory for ChoseVideo storage
             $uploadFileDir = './../Vid/';
                $dest_path = $uploadFileDir.$fileName;

            // Transfer the file to the desired directory
             if (move_uploaded_file($fileTmpPath, $dest_path)) {
              echo "Uploaded Successfully."; 
              } else { 
              echo "Not Moving File"; 
              return 0;
              } 
              } else {
               echo "This Type Not Allowed"; 
               return 0;
               }
               } else {
                echo "Error: ". $_FILES['ChoseVideo']['error']; 
                return 0;
                }

	$data = Array(
		  'Vid_Title'	=>$_POST['Vid_Title'],
      'Vid_Tags'	=>$_POST['Vid_Tags'],
      'Vid_Source'	=> $fileName
	  
		  );

	if (($_POST['id'] >0)){
		$db->where('Vid_ID', $_POST['id']);
		$db->update('videos_list', $data);



	} else {

		$db->insert('videos_list', $data);


	}
	header("location: index.php?Loc=VidList");
	exit(0);	
}


$Vid_Title = '';
$Vid_Tags = '';

if (isset($_GET['id'])){
	
	$db->where('Vid_ID', $_GET['id']);
	$values = $db->getOne('videos_list');
	if ($values !== NULL)
	{
		$Vid_Title = $values['Vid_Title'];
    $Vid_Tags = $values['Vid_Tags'];
		

	}
	
}


?>

<section class="content">
  <div class="row">
    <div class="col-lg-12 col-xs-12"> 
      <!-- small box -->
      
      <form id="AddNewVideo" enctype = "multipart/form-data" action="AddNewVideo.php" method="POST" class="form-horizontal" >
        <div>
          <input name="id" type="hidden" value="<?=isset($_GET['id'])?$_GET['id']:''?>" required class="form-control">
        </div>
        <fieldset>
          <legend>Please fill the Following Form</legend>
          <div class="form-group">
            <label for="Vid_Title" class="col-sm-4 control-label">Video Title<sup class="text-danger">* </sup>: </label>
            <div class="col-sm-6">
              <input id="Vid_Title" name="Vid_Title" type="text" value="<?=$Vid_Title?>" required class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="Vid_Tags" class="col-sm-4 control-label">Video Tags<sup class="text-danger">* </sup>: </label>
            <div class="col-sm-6">
              <input id="Vid_Tags" name="Vid_Tags" type="text" value="<?=$Vid_Tags?>" required class="form-control">
            </div>
          </div>
          <div class="form-group">
          <label for="Video" class="col-sm-4 control-label">Chose file:</label>
          <div class="col-sm-6">
           <input type="file" name="ChoseVideo" id="ChoseVideo" required acceptance="video/*" class="form-control"> 
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

