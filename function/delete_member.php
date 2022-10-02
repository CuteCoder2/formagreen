<?php

require_once('db/db.php');

if(isset($_POST['uname'])){
     $login = $_POST['uname'];

    $delet_stmt = "DELETE FROM forma_green.membre WHERE login = ?";
    
    $prepare_delete = $conn->prepare($delet_stmt);
    
    $exec_delete = $prepare_delete->execute([$login]);

    header('location:../views/all_members.php');
    
}else{

    echo 'login not set';

}

?>