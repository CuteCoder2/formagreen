<?php

require_once('db/db.php');

require_once('phpqrcode/qrlib.php');
try {

    $conn->query("START TRANSACTION");

    $conn->query("SET AUTOCOMMIT = 0");

    if (isset($_POST['login']) AND !empty($_POST['login'])) {


            $select_all_mem_stmt = "SELECT * FROM forma_green.membre where 1 AND login = ?";

            $pre_stmt = $conn->prepare($select_all_mem_stmt);

            $pre_stmt->execute([$_POST['login']]);

            $ret_all_result = $pre_stmt->fetchAll();
            foreach($ret_all_result as $row){
                $sex = $row['gender'];
            }

        $uname = $_POST['login'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $postcode = $_POST['postcode'];
        //html PNG location prefix
        $PNG_WEB_DIR = '../barcode/';

        $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . $PNG_WEB_DIR . DIRECTORY_SEPARATOR;




        if (!file_exists($PNG_TEMP_DIR)) {
            mkdir($PNG_TEMP_DIR);
        }

        $text =
            "Name: $fname $lname 
age :  $age
sex : $sex
email : $email
phone : $phone
postal code : $postcode
";

        $barcode   =    $PNG_WEB_DIR . $uname . '.png';

        //processing form input
        //remember to sanitize user input in real-life solution !!!
        $errorCorrectionLevel = 'H';
        $matrixPointSize = 4;
        //default data

        QRcode::png($text, $barcode, $errorCorrectionLevel, $matrixPointSize, 2);


    $insert_stmt = "UPDATE  `membre` SET `nom` = ? , `prenom` = ? , `age` = ? , `gender` = ? , `email` = ? , `phone` = ? , `postal_code` = ? ,`barcode` = ?";

       $pre_insert_stmt = $conn->prepare($insert_stmt);

   
       $pre_insert_stmt->execute([ $fname, $lname, $age, $sex, $email, $phone,$postcode, $barcode,]);

        $conn->query("COMMIT");

        header('location:../views/all_members.php');
    
    } else {
        echo 'user did\'nt confirmed';
    }
} catch (PDOException $th) {
    $conn->query("ROLLBACK");
    throw $th;
}
