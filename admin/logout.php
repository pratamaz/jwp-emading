<?php
    session_start();

    // Unset Semua Session
    unset($_SESSION['username']);
    unset($_SESSION['id_users']);
    
    // Unset All
    session_unset();

    // Destroy Session
    session_destroy();

    // Arahkan ke Halaman Login
    header('location: ../login.php?pesan=logout');
    exit;
