<?php

$db = new Mysqli;
$db->connect('localhost', 'root','','todo_db');
if (!$db) {
	echo "Somthing wrong with DB connection";
}

?>