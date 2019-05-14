<?php

include 'db-connection.php';

$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && (int)($_GET['per-page']) <= 50 ? (int)$_GET['per-page'] : 6);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$sql = "select * from tasks limit ".$start.", ".$perPage." ";
$total = $db->query("select * from tasks")->num_rows;
$pages = ceil($total / $perPage);

$rows = $db->query($sql);
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
		<div class="row">
			<div class="col-lg-12">
				<center><h1>What to do next..?</h1></center>
					<form id="form" class="col-lg-6 col-8 mx-auto mt-3" method="post" action="insert.php">
					<div class="input-group">
						<input id="input" class="form-control" placeholder="Add New Task" required name="task">
						<span>
							<input type="submit"  name="send" value="Submit" class="btn btn-outline-light">
						</span>
					</div>			     
					</form>
				<hr>
				<table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th>#</th>
				      <th>Tasks</th>
				      <th>Done</th>
				      <th>Update</th>
				      <th>Remove</th>
				    </tr>
				  </thead>
				  <tbody class="list-item">
				    <tr>
				    	<?php while($row = $rows->fetch_assoc()):?>
				      <th><?php echo $row['ID'] ?></th>
				      <td class="col-md-10 tname" id=" <?php echo "name".$row['ID']; ?> " ><?php echo $row['Name']; ?></td>
				      <td class="action"><input type="checkbox" id="done" class="checkbox" ></td>
				      <td class="action"><a href="update.php?id=<?php echo $row['ID']; ?>" class="btn btn-outline-light"><i class="fas fa-edit"></i></a></td>
				      <td class="action"><a href="delete.php?id=<?php echo $row['ID']; ?>" class="btn btn-outline-light"><i class="far fa-trash-alt"></i></a></td>
				    </tr>
				    <?php endwhile; ?>
				  </tbody>
				</table>
			</div>
			<div class="col-lg-12">
					<ul class="pagination">
						<?php for ($i=1; $i <= $pages ; $i++): ?>
						<li><a  class="page-no" href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>"><?php echo $i; ?></a></li>
					<?php endfor; ?>
					</ul>
			</div>
		</div>
</div>
<script type="text/javascript">
	window.onload = function() {
	//variables
	var done = document.getElementsByClassName("checkbox");
	var tar = document.querySelectorAll(".tname");
	//console.log(done);
	console.log(tar);
	console.log(tar.element.id);
	//check event listener
	// for (var i = 0; i <= 6; i++) {
	// 	done.addEventListener('click',function(e){

	// 	});
	// }

	 
}
</script>
</body>
</html>