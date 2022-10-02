<?php
require_once("db/db.php");


try {


    if (isset($_POST['new_sub'])) {
    
        $date = $_POST['new_sub'];
    
        $sub_stmt = "INSERT INTO forma_green.abonnement (id_abon,date_end,login) values (?,?,?);";
    
        $pre_sub_stmt = $conn->prepare($sub_stmt);
    
        $execute_stmt = $pre_sub_stmt->execute([$_SESSION['login'],$date,$_SESSION['login']]);
    
        header("location:../views/subscribtion.php");
    }
    if (isset($_POST['new_sub_date'])) {
    
        $new_date = $_POST['new_sub_date'];
    
        $sub_stmt = "UPDATE forma_green.abonnement SET date_end = ?";
    
        $pre_sub_stmt = $conn->prepare($sub_stmt);
    
        $execute_stmt = $pre_sub_stmt->execute([$new_date]);
    
        header("location:../views/subscribtion.php");
    }
    if (isset($_POST['end'])) {
    
    
        $sub_stmt = "DELETE FROM forma_green.abonnement WHERE login = '".$_SESSION['login']."'";
    
        $pre_sub_stmt = $conn->query($sub_stmt);
    
        header("location:../views/subscribtion.php");
    }
    
    
} catch (\Throwable $th) {
    throw $th;
    // header("location:../views/subscribtion.php");
}


?>