<?php
require_once('db/db.php');


$get_type_stmt = "SELECT * FROM forma_green.type_membre WHERE 1";

$query = $conn->query($get_type_stmt);

$retur_all_type = $query->fetchAll();
