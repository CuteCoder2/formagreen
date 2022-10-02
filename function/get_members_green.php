<?php

require_once('db/db.php');


try {
    $select_memeber_area = "SELECT * from forma_green.membre,forma_green.green_area where 1 AND membre.login = green_area.login and membre.login = '".$_SESSION['login']."'";
    
    $query_area = $conn->query($select_memeber_area);

    $fet_all_areas_member = $query_area->fetchAll();


} catch (PDOException $th) {
    throw $th;
}