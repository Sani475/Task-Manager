<?php
include 'db-connection.php';

if (isset($_POST['send'])) {
	
	$name = htmlspecialchars($_POST['task']);

	$sql = "insert into tasks (Name) values ('$name')";
	$val = $db->query($sql);

	if ($val) {
		header('location:index.php');
	}
}

?>