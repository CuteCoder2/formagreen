<?php

require_once('db/db.php');

require_once('phpqrcode/qrlib.php');

try {
   

    if (isset($_POST['fname']) && isset($_POST['lname']) && !empty($_POST['fname']) && !empty($_POST['lname']))
    {
        $uname = $_POST['uname'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $longitute = $_POST['longitute'];
        $latitude = $_POST['latitute'];
        $comname = $_POST['comname'];

        $stmt_num_green_areas = "SELECT COUNT(*) AS num FROM forma_green.membre,forma_green.green_area WHERE 1 AND membre.login = green_area.login AND membre.login = ?";

        $prep_num_green = $conn->prepare($stmt_num_green_areas);

        $prep_num_green->execute([$uname]);

        $retu_num = $prep_num_green->fetchAll();


        
        foreach ($retu_num as $row) {
            $num = $row['num'];
        }
        
        
    

        //  html PNG location prefix
         $PNG_WEB_DIR = '../barcode/';

         $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . $PNG_WEB_DIR . DIRECTORY_SEPARATOR;
 
 
 $num = $num + 1;

 
         if (!file_exists($PNG_TEMP_DIR)) {
            
            mkdir($PNG_TEMP_DIR);
         }
 
         $text =
"Name: $fname $lname 
 age :". $_POST['age']."
 sex : ". $_POST['sex']."
 email : ". $_POST['email']."
 phone : ". $_POST['phone']."
 postal code : ".$_POST['postalcode']." 
 Green Areas N° : $num
 ";

 
         $barcode   =    $PNG_WEB_DIR . $uname . '.png';
 
         //processing form input
         //remember to sanitize user input in real-life solution !!!
         $errorCorrectionLevel = 'H';
         $matrixPointSize = 4;
         //default data
 
         QRcode::png($text, $barcode, $errorCorrectionLevel, $matrixPointSize, 2);
 
        
        
        $insert_area = "INSERT INTO forma_green.green_area (longitude,latitute,area_name,login) values(?,?,?,?)";
        
        $pre_insertion = $conn->prepare($insert_area);
        
        $pre_insertion->execute([$longitute,$latitude,$comname,$uname]);
        
        
        header("location:../views/all_green_areas.php");
        
    }


} catch (PDOException $error) {
    throw $error;
}