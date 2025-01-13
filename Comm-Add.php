<?php 
include_once('connection.php');

if (isset($_POST['Videos_Id']) && isset($_POST['comment'])){


	$data = Array(
		  'U_ID'	=>$_POST['userid'],
		  'Vid_ID'	=>$_POST['Videos_Id'],
		  'Comm'	=>$_POST['comment'],
	  	'Date' => date('Y-m-d')
		  );
		  
  
		$db->insert('comments_list', $data);
	
}else{
	var_dump('aho g');
	return 0;
    error_log("Invalid request or missing data.");
}

?>