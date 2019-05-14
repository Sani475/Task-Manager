<?php

include 'db-connection.php';

$id = (int)$_GET['id'];
$sql = "select * from tasks where ID = '$id'";

$rows = $db->query($sql);
$row = $rows->fetch_assoc();

if (isset($_POST['send'])) {
	$task = htmlspecialchars($_POST['task']);

	$sql2 = "update tasks set Name = '$task' where ID = '$id'";
	$db->query($sql2);

	header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>To Do Manager</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="inc/style.css">
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
<div class="container">
		<div class="row update-page" margin-top="100px">
			<div class="col-lg-12">
				<center><h1>Update Task</h1></center>
					<form id="form" class="col-lg-6 col-8 mx-auto mt-5" method="post">
					<div class="input-group">
						<input id="input" class="form-control" value="<?php echo $row['Name']; ?>" required name="task">
					</div>
					<div class="update-btn">
						<input type="submit"  name="send" value="Update" class="btn btn-outline-light">
					</div>		     
					</form>
			</div>
		</div>
</div>
</body>
</html>