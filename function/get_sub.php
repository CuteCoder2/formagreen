<?php


require_once("db/db.php");



$get_sub_stmt = "SELECT * FROM forma_green.abonnement  where login = '".$_SESSION['login']."'";

$qurey_get_sub = $conn->query($get_sub_stmt);

$get_all_sub = $qurey_get_sub->fetchAll();
