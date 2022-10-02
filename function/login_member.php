<?php
require_once('db/db.php');

try {
    if (isset($_POST['memeber'])) {

        $login = $_POST['member_log'];

        $password = $_POST['memeber_psd'];

        $select_user = "SELECT * FROM membre WHERE login = ? and mot_pass = ?";

        $pre_selection = $conn->prepare($select_user);

        $pre_selection->execute([$login, $password]);

        $result_selection = $pre_selection->fetchAll();

        if ($pre_selection->rowCount() > 0) {

            foreach ($result_selection as $row) {
                $_SESSION['first Name'] = $row['nom'];
                $_SESSION['last Name'] = $row['prenom'];
                $_SESSION['login'] = $row['login'];
            }

            header('location:../views/home_member.php');
        } else {
            header('location:../index.php');
        }
    } else {

        header('location:../index.php');
    }
} catch (PDOException $error) {

    // throw new Exception('failed to execute request');
    echo $error;
}
