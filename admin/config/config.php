<?php
session_start();

if (isset($_SESSION['login'])) {
    $id_users   = $_SESSION["id_users"];
    $nama       = $_SESSION["name"];
    $username   = $_SESSION["username"];
    $password   = $_SESSION["password"];
}

require 'controller.php';
require 'database.php';
