<?php
require_once('db/db.php');

if(isset($_GET['uname'])){

    $get_user = "SELECT * FROM forma_green.membre where 1 AND login = ?;";
    
    $pre_get_user = $conn->prepare($get_user);
    
    $pre_get_user->execute([$_GET['uname']]);
    
    $get_all_user = $pre_get_user->fetchAll();
    
    echo json_encode($get_all_user);

}