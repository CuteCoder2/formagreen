<?php

require_once('db/db.php');

if(isset($_POST['uname'])){
     $login = $_POST['uname'];
     $area = $_POST['area'];

    $delet_stmt = "DELETE FROM forma_green.green_area WHERE login = ? AND area_name = ?";
    
    $prepare_delete = $conn->prepare($delet_stmt);
    
    $exec_delete = $prepare_delete->execute([$login,$area]);

    header('location:../views/all_green_areas.php');
    
}else{

    echo 'login not set';

}

?>