<?php

require_once('db/db.php');

$member_greenarea_cordinate = "SELECT DISTINCT(green_area.login),nom,barcode,prenom,area_name,latitute,longitude FROM forma_green.membre,forma_green.green_area WHERE 1 AND green_area.login = membre.login;";


$query_all = $conn->query($member_greenarea_cordinate);

$get_all_result = $query_all->fetchAll();


// var_dump($get_all_result);


?>