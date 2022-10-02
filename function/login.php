<?php
require_once('db/db.php');

try {
    if (isset($_POST['admin'])) {

        $login = $_POST['admin_log'];

        $password = $_POST['admin_psd'];

        $select_user = "SELECT * FROM admin WHERE login = ? and password = ?";

        $pre_selection = $conn->prepare($select_user);

        $pre_selection->execute([$login, $password]);

        $result_selection = $pre_selection->fetchAll();

        if ($pre_selection->rowCount() > 0) {

            foreach ($result_selection as $row) {
                $_SESSION['first Name'] = $row['nom'];
                $_SESSION['last Name'] = $row['prenom'];
                $_SESSION['login'] = $row['login'];
            }

            header('location:../views/home.php');
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
