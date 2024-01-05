<?php
// $pass = password_hash('jewepe123', PASSWORD_DEFAULT);
// var_dump($pass);
// die;
include 'admin/config_query.php';
$database = new database();

// Inisialisasi Session
session_start();

// Cek Session Aktif
if (isset($_SESSION['username']) || isset($_SESSION['id_users'])) {
    header('Location: admin/index.php');
} else {
    // Cek Apakah Form disubmit?
    if (isset($_POST['submit'])) {
        // Menghilangkan Blackslash
        $username = stripslashes($_POST['username']);
        $password = stripslashes($_POST['password']);

        // Cek Nilai Username Password Apakah Kosong?
        if (!empty(trim($username))  && !empty(trim($password))) {
            // Select Data tb_users berdasarkan username
            $query = $database->get_data_users($username);
            if ($query) {
                $rows = mysqli_num_rows($query);
            } else {
                $rows = 0;
            }

            // Cek Ketersediaan Data Username
            if ($rows != 0) {
                $getPassword = mysqli_fetch_assoc($query)['password'];
                if(password_verify($password, $getPassword)){
                    $_SESSION['username']=$username;
                    $_SESSION['id_users']=mysqli_fetch_assoc($query)['id_users'];
                    header('location: admin/index.php');
                } else {
                    header('location: login.php?pesan=gagal');
                }

            } else {
                header("location: login.php?pesan=notfound");
            }
        } else {
            header("location: login.php?pesan=empty");
        }
    } else {
        header("location: login.php?pesan=empty");
    }
}
