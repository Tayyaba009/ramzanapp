<?php
require_once 'connection.php';

$sTableName = $_GET['tbl'];
$sFldName = $_GET['kfld'];
$nIDValue = $_GET['kval'];



$query = "DELETE  FROM $sTableName WHERE $sFldName = $nIDValue";
$db->query($query);
 
header("Location: index.php?Loc=" . $_GET['Loc']);

?>
