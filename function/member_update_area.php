<?php


require_once('db/db.php');

require_once('phpqrcode/qrlib.php');

try {
   

    if (isset($_POST['uname']) && !empty($_POST['uname']))
    {
        $uname = $_POST['uname'];
        $longitute = $_POST['longitute'];
        $latitude = $_POST['latitute'];
        $comname = $_POST['comname'];
        
        $stmt_num_green_areas = "SELECT * FROM forma_green.membre,forma_green.green_area WHERE 1 AND membre.login = green_area.login AND membre.login = ?";

        $prep_num_green = $conn->prepare($stmt_num_green_areas);

        $prep_num_green->execute([$uname]);

        $retu_num = $prep_num_green->fetchAll();


        $num = $prep_num_green->rowCount();

        
        
        foreach ($retu_num as $row) {
            $fname = $row['nom'];
            $lname = $row['prenom'] ;
            $age = $row['age'];
            $sex = $row['gender'];
            $email = $row['email'];
            $phone = $row['phone'];
            $postalcode = $row['postal_code'];
        
        }
        
        
    

        //  html PNG location prefix
         $PNG_WEB_DIR = '../barcode/';

         $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . $PNG_WEB_DIR . DIRECTORY_SEPARATOR;

 
         if (!file_exists($PNG_TEMP_DIR)) {
            
            mkdir($PNG_TEMP_DIR);
         }
 
         $text =
"Name: $fname $lname 
 age :".$age."
 sex : ". $sex."
 email : ". $email."
 phone : ". $phone."
 postal code : ".$postalcode." 
 Green Areas N° : $num
 ";

 
         $barcode   =    $PNG_WEB_DIR . $uname . '.png';
 
         //processing form input
         //remember to sanitize user input in real-life solution !!!
         $errorCorrectionLevel = 'H';
         $matrixPointSize = 4;
         //default data
 
         QRcode::png($text, $barcode, $errorCorrectionLevel, $matrixPointSize, 2);
 
        
        
        $insert_area = "UPDATE  forma_green.green_area SET  longitude = ? ,latitute = ? , area_name= ? WHERE login = ?";
        
        $pre_insertion = $conn->prepare($insert_area);
        
        $pre_insertion->execute([$longitute,$latitude,$comname,$uname]);
        
        
        header('location:../views/member_green_areas.php');
    }


} catch (PDOException $error) {
    throw $error;
}