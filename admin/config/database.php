<?php

// Konfigurasi Database
$host       = 'localhost';
$username   = 'root';
$password   = '';
$dbname     = 'emading-jwp';

$db = mysqli_connect($host, $username, $password, $dbname);

if ($db) {
    echo "Database Sukses";
} else {
    echo "Database Error";
}
