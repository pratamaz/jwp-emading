<?php

function loginAdmin($username, $password) {
    global $koneksi;

    // Lindungi dari SQL Injection
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    // Query untuk mengambil data admin dari database
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    // Cek apakah username ditemukan
    if (mysqli_num_rows($result) == 1) {
        $admin = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $admin['password'])) {
            // Login berhasil
            // Redirect ke halaman dashboard admin
            header('Location: dashboard.php');
            exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
        }
    }

    // Login gagal
    return false;
}


?>