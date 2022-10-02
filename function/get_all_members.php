<?php


require_once('db/db.php');


// get all member
try {
    $select_all_memebers = "SELECT * FROM forma_green.membre WHERE 1;";
    
    $query = $conn->query($select_all_memebers);

    $fet_all_members = $query->fetchAll();

} catch (PDOException $th) {
    throw $th;
}




// get all green areas 
try {
    $select_all_areas = "SELECT * from forma_green.membre,forma_green.green_area where 1 AND membre.login = green_area.login;";
    
    $query_area = $conn->query($select_all_areas);

    $fet_all_areas = $query_area->fetchAll();

} catch (PDOException $th) {
    throw $th;
}