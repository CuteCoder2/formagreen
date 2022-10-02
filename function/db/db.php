<?php
session_start();

try {

    $conn = new PDO("mysql:host=localhost;dbname=forma_green", "root", "");

    // echo "Connection Established";
} catch (PDOException $error) {
    throw new Exception("Error Processing Request", 1);
}
