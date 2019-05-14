<?php 
include 'db-connection.php';

$id = (int)$_GET['id'];

$sql = "delete from tasks where ID = '$id'";
$del = $db->query($sql);

	if ($del) {
		header('location:index.php');
	}
?>