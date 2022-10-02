<?php

require_once('db/db.php');

require_once('phpqrcode/qrlib.php');
try {

    $conn->query("START TRANSACTION");

    $conn->query("SET AUTOCOMMIT = 0");

    if (isset($_POST['confirmed'])) {

        $uname = $_POST['uname'];
        $pswd = $_POST['pswd'];
        $typememe = $_POST['typememe'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $postcode = $_POST['postcode'];
        $barcode = 'barcode';
        $photo = 'photo';

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



        $insert_stmt = "INSERT INTO `membre` ( `login`, `mot_pass`, `id_type_membre`, `nom`, `prenom`, `age`, `gender`, `email`, `phone`, `postal_code`, `photo`, `barcode`)
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

        $pre_insert_stmt = $conn->prepare($insert_stmt);

    
        $pre_insert_stmt->execute([$uname, $pswd, $typememe, 
        
        $fname, $lname, $age, $sex, $email, $phone, 
        
        $postcode, $photo, $barcode,]);

        $conn->query("COMMIT");

        header('location:../views/all_members.php');
    
    } else {
        echo 'user did\'nt confirmed';
    }
} catch (PDOException $th) {
    $conn->query("ROLLBACK");
    throw $th;
}
